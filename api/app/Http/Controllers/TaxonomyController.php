<?php
namespace App\Http\Controllers;

use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxonomyController extends Controller{

	/**
	 * Taxonomy controller instance.
	 *
	 * @return void
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * @OA\Get(
	 *	 path="/api/v2/taxonomy",
	 *	 operationId="/api/v2/taxonomy",
	 *	 tags={""},
	 *	 @OA\Parameter(
	 *		 name="limit",
	 *		 in="query",
	 *		 description="Controls the number of results in the page.",
	 *		 required=false,
	 *		 @OA\Schema(type="integer", default=100)
	 *	 ),
	 *	 @OA\Parameter(
	 *		 name="offset",
	 *		 in="query",
	 *		 description="Determines the offset for the search results. A limit of 200 and offset of 100, will get the third page of 100 results.",
	 *		 required=false,
	 *		 @OA\Schema(type="integer", default=0)
	 *	 ),
	 *	 @OA\Response(
	 *		 response="200",
	 *		 description="Returns list of inventories registered within system",
	 *		 @OA\JsonContent()
	 *	 ),
	 *	 @OA\Response(
	 *		 response="400",
	 *		 description="Error: Bad request. ",
	 *	 ),
	 * )
	 */
	public function showAllTaxa(Request $request){
		$this->validate($request, [
			'limit' => 'integer',
			'offset' => 'integer'
		]);
		$limit = $request->input('limit',100);
		$offset = $request->input('offset',0);

		$fullCnt = Taxonomy::count();
		$result = Taxonomy::skip($offset)->take($limit)->get();

		$eor = false;
		$retObj = [
			'offset' => (int)$offset,
			'limit' => (int)$limit,
			'endOfRecords' => $eor,
			'count' => $fullCnt,
			'results' => $result
		];
		return response()->json($retObj);
	}

	/**
	 * @OA\Get(
	 *	 path="/api/v2/taxonomy/search",
	 *	 operationId="/api/v2/taxonomy/search",
	 *	 tags={""},
	 *	 @OA\Parameter(
	 *		 name="taxon",
	 *		 in="query",
	 *		 description="Taxon searh term",
	 *		 required=true,
	 *		 @OA\Schema(type="string")
	 *	 ),
	 *	 @OA\Parameter(
	 *		 name="type",
	 *		 in="query",
	 *		 description="Type of search",
	 *		 required=false,
	 *		 @OA\Schema(
	 *			type="string",
	 *			default="EXACT",
	 *			enum={"EXACT", "START", "WHOLEWORD", "WILD"}
	 *		)
	 *	 ),
	 *	 @OA\Parameter(
	 *		 name="limit",
	 *		 in="query",
	 *		 description="Controls the number of results in the page.",
	 *		 required=false,
	 *		 @OA\Schema(type="integer", default=100)
	 *	 ),
	 *	 @OA\Parameter(
	 *		 name="offset",
	 *		 in="query",
	 *		 description="Determines the offset for the search results. A limit of 200 and offset of 100, will get the third page of 100 results.",
	 *		 required=false,
	 *		 @OA\Schema(type="integer", default=0)
	 *	 ),
	 *	 @OA\Response(
	 *		 response="200",
	 *		 description="Returns list of inventories registered within system",
	 *		 @OA\JsonContent()
	 *	 ),
	 *	 @OA\Response(
	 *		 response="400",
	 *		 description="Error: Bad request. ",
	 *	 ),
	 * )
	 */
	public function showAllTaxaSearch(Request $request){
		$this->validate($request, [
			'taxon' => 'required',
			'limit' => 'integer',
			'offset' => 'integer'
		]);
		$limit = $request->input('limit',100);
		$offset = $request->input('offset',0);

		$type = $request->input('type', 'EXACT');

		$taxaModel = Taxonomy::query();
		if($type == 'START'){
			$taxaModel->where('sciname', 'LIKE', $request->taxon . '%');
		}
		elseif($type == 'WILD'){
			$taxaModel->where('sciname', 'LIKE', '%' . $request->taxon . '%');
		}
		elseif($type == 'WHOLEWORD'){
			$taxaModel->where('unitname1', $request->taxon)
			->orWhere('unitname2', $request->taxon)
			->orWhere('unitname3', $request->taxon);
		}
		else{
			//Exact match
			$taxaModel->where('sciname', $request->taxon);
		}

		$fullCnt = $taxaModel->count();
		$result = $taxaModel->skip($offset)->take($limit)->get();

		$eor = false;
		$retObj = [
			'offset' => (int)$offset,
			'limit' => (int)$limit,
			'endOfRecords' => $eor,
			'count' => $fullCnt,
			'results' => $result
		];
		return response()->json($retObj);
	}

	/**
	 * @OA\Get(
	 *	 path="/api/v2/taxonomy/{identifier}",
	 *	 operationId="/api/v2/taxonomy/identifier",
	 *	 tags={""},
	 *	 @OA\Parameter(
	 *		 name="identifier",
	 *		 in="path",
	 *		 description="Identifier (PK = tid) associated with taxonomic target",
	 *		 required=true,
	 *		 @OA\Schema(type="string")
	 *	 ),
	 *	 @OA\Response(
	 *		 response="200",
	 *		 description="Returns metabase on inventory registered within system with matching ID",
	 *		 @OA\JsonContent()
	 *	 ),
	 *	 @OA\Response(
	 *		 response="400",
	 *		 description="Error: Bad request. Inventory identifier is required.",
	 *	 ),
	 * )
	 */
	public function showOneTaxon($id, Request $request){
		$taxonObj = Taxonomy::find($id);

		//Set status and parent (can't use Eloquent model due to table containing complex PKs)
		$taxStatus = DB::table('taxstatus as s')
		->select('s.parentTid', 's.taxonomicSource', 's.unacceptabilityReason', 's.notes', 'a.tid', 'a.sciname', 'a.author')
		->join('taxa as a', 's.tidAccepted', '=', 'a.tid')
		->where('s.tid', $id)->where('s.taxauthid', 1);
		$taxStatusResult = $taxStatus->get();
		$taxonObj->parentTid = $taxStatusResult[0]->parentTid;

		//Set Status
		if($id == $taxStatusResult[0]->tid){
			$taxonObj->status = 'accepted';
		}else{
			$taxonObj->status = 'synonym';
			$accepted = [];
			$accepted['tid'] = $taxStatusResult[0]->tid;
			$accepted['scientificName'] = $taxStatusResult[0]->sciname;
			$accepted['scientificNameAuthorship'] = $taxStatusResult[0]->author;
			$accepted['taxonomicSource'] = $taxStatusResult[0]->taxonomicSource;
			$accepted['unacceptabilityReason'] = $taxStatusResult[0]->unacceptabilityReason;
			$accepted['taxonRemarks'] = $taxStatusResult[0]->notes;
			$taxonObj->accepted = $accepted;
		}

		//Set parent
		$parStatus = DB::table('taxaenumtree as e')
		->select('p.tid', 'p.sciname as scientificName', 'p.author', 'p.rankid')
		->join('taxa as p', 'e.parentTid', '=', 'p.tid')
		->where('e.tid', $id)->where('e.taxauthid', 1);
		$parStatusResult = $parStatus->get();
		$taxonObj->classification = $parStatusResult;

		if(!$taxonObj->count()) $taxonObj = ['status' =>false, 'error' => 'Unable to locate inventory based on identifier'];
		return response()->json($taxonObj);
	}

	/**
	 * @OA\Get(
	 *	 path="/api/v2/taxonomy/{identifier}/description",
	 *	 operationId="/api/v2/taxonomy/identifier/description",
	 *	 tags={""},
	 *	 @OA\Parameter(
	 *		 name="identifier",
	 *		 in="path",
	 *		 description="PK, GUID, or recordID associated with target taxonomic unit",
	 *		 required=true,
	 *		 @OA\Schema(type="string")
	 *	 ),
	 *	 @OA\Parameter(
	 *		 name="limit",
	 *		 in="query",
	 *		 description="Controls the number of results in the page.",
	 *		 required=false,
	 *		 @OA\Schema(type="integer", default=100)
	 *	 ),
	 *	 @OA\Parameter(
	 *		 name="offset",
	 *		 in="query",
	 *		 description="Determines the offset for the search results. A limit of 200 and offset of 100, will get the third page of 100 results.",
	 *		 required=false,
	 *		 @OA\Schema(type="integer", default=0)
	 *	 ),
	 *	 @OA\Response(
	 *		 response="200",
	 *		 description="Returns list of taxonomic descriptions for a given taxon",
	 *		 @OA\JsonContent()
	 *	 ),
	 *	 @OA\Response(
	 *		 response="400",
	 *		 description="Error: Bad request. ",
	 *	 ),
	 * )
	 */
	public function showAllDescriptions($id, Request $request){
		$this->validate($request, [
				'limit' => 'integer',
				'offset' => 'integer'
		]);
		$limit = $request->input('limit',100);
		$offset = $request->input('offset',0);

		$descriptionObj = Taxonomy::find($id)->descriptions();
		//$descriptionObj->statement;
		$fullCnt = $descriptionObj->count();
		$result = $descriptionObj->skip($offset)->take($limit)->get();
		//Add statements
		//$result->statement = DB::table('taxadescrstmts')->where('tdbid', $id)->get();

		$eor = false;
		$retObj = [
			'offset' => (int)$offset,
			'limit' => (int)$limit,
			'endOfRecords' => $eor,
			'count' => $fullCnt,
			'results' => $result
		];
		return response()->json($retObj);
	}

}