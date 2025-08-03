<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use App\Models\CommonAdmin;

class AboutusController extends Controller
{
    protected $CommonAdminmodel;

    public function __construct(){

        $this->CommonAdminmodel = new CommonAdmin();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function aboutUsPages($slug)
    {
        $data = $this->CommonAdminmodel->getAllDataWhere('cms_pages', ['parent_menu' => $slug]);

        // dd($data);

        $string = str_replace('_', ' ', $slug);
        $parent_menu_show = ucwords($string);

        return view('backend.cms.all_pages',[
            'data'=>$data,
            'title'=>$parent_menu_show,
            'parent_menu'=>$parent_menu_show,
            'meta_desc'=>'This is meta description for '.$parent_menu_show.' pages'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(1111111111);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function show(Aboutus $aboutus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutus  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contentEdit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'cms_pages');

        // dd($res);
        
        return view('backend.cms.content_update',[
            'data'=>$res,
            'title'=>$res->page_name,
            'parent_menu'=>$res->parent_menu,
            'meta_desc'=>'This is meta description for About Us Content'
        ]);
    }

    // Update Data
    function contentUpdateSave_old(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'contents'=>'required',
        ]);

        $adminSessionData = session('adminData');

        // $post->user_id=$request->user()->id;
        $data['details']    = $request->contents;
        $data['updated_at'] = date('Y-m-d h:i:s');
        $data['action_by']  = $adminSessionData['id'];

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'cms_pages');

        if($res){

            $res_cms_page = $this->CommonAdminmodel->getDatabyId($id, 'cms_pages');
            return redirect('admin/cms_pages/'.$res_cms_page->parent_menu)->with('success','Content has been updated');
        }else{
            return redirect('admin/cms_pages/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    } 
    
    // Update Data
    function contentUpdateSave(Request $request, $id){

        $res_cms_page = $this->CommonAdminmodel->getDatabyId($id, 'cms_pages');

        $request->validate([
            'title'=>'required',
            'contents'=>'required',
        ]);

        $adminSessionData = session('adminData');

        // $post->user_id=$request->user()->id;
        $data['details']    = $request->contents;
        $data['updated_at'] = date('Y-m-d h:i:s');
        $data['action_by']  = $adminSessionData['id'];

        $path = $res_cms_page->attachment_path;
        if ($request->hasFile('attachment')) {
            $attachment_file=$request->file('attachment');
            $attachmentFile = $path = time().'.'.$attachment_file->getClientOriginalExtension();
            $dest1=public_path('/attachments/files');
            $attachment_file->move($dest1,$attachmentFile);
        }
        $data['attachment_title']   = $request->attachment_title?$request->attachment_title:$res_cms_page->attachment_title;
        $data['attachment_path']    = $path;

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'cms_pages');

        if($res){

            return redirect('admin/cms_pages/'.$res_cms_page->parent_menu)->with('success','Content has been updated');
        }else{
            return redirect('admin/cms_pages/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    } 

    /**
     * Upload file from CKEDITOR.
     * @param int $id
     * @return Renderable
     */
    public function upload_ckeditor_data(Request $request)
    {

        $path = '';
        if ($request->hasFile('upload')) {

            $image1=$request->file('upload');
            $bannerImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/ckeditor_media');
            $image1->move($dest1,$bannerImage);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('imgs/ckeditor_media/' . $bannerImage);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
