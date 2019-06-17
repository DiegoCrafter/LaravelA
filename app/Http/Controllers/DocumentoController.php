<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Document;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentohow=DB::select("SELECT DOC.idgtd_documento, DOC.DOC_NOMBRE, EDO.EDO_COSTO, EDO.EDO_CUENTA, DOC.DOC_CODIGO, TDO.TDO_NOMBRE, doc.doc_estado, doc.doc_formato_ruta, edo.idgtd_nivel_documento,ent.ent_nombre, edo.edo_cantidad_tiempo, edo.edo_unidad_tiempo
        FROM GTD_PERSONA PER
        INNER JOIN GTD_USUARIO USU ON USU.IDGTD_PERSONA=PER.IDGTD_PERSONA
        INNER JOIN GTD_ENTIDAD ENT ON PER.IDGTD_ENTIDAD=ENT.IDGTD_ENTIDAD
        INNER JOIN GTD_ENTIDAD_DOCUMENTO EDO ON EDO.IDGTD_ENTIDAD=ENT.IDGTD_ENTIDAD
        INNER JOIN GTD_DOCUMENTO DOC ON edo.idgtd_documento=doc.idgtd_documento
        INNER JOIN GTD_TIPO_DOCUMENTO TDO ON DOC.IDGTD_TIPO_DOCUMENTO=TDO.IDGTD_TIPO_DOCUMENTO
        WHERE per.idgtd_persona=1");
        return $documentohow;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requirements()
    {
        $requirements=DB::select("SELECT req.req_nombre
        FROM gtd_documento doc
        inner join gtd_entidad_documento edo on edo.idgtd_documento=doc.idgtd_documento
        inner join gtd_documento_requisito dre on dre.idgtd_entidad_documento=edo.idgtd_entidad_documento
        inner join gtd_requisito req on dre.idgtd_requisito=req.idgtd_requisito
        WHERE edo.idgtd_entidad_documento=33");
        return $requirements;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //Solicitamos al modelo el Pokemon con el id solicitado por GET.
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}