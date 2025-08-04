<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonAdmin;

class CommonAdminController extends Controller
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
    	

        $data = $this->CommonAdminmodel->getAllData('banners');

        // dd($data);
        
        return view('backend.website.banners',[
            'data'=>$data,
            'title'=>'All Banners',
            'meta_desc'=>'This is meta description for all Banners'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_banner()
    {
        return view('backend.website.banner_add');
    }

    // Save Data
    function banner_add_save(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        // dd($request);

        // Post bannerImage
        $bannerImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $bannerImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/banner_image');
            $image1->move($dest1,$bannerImage);
        }else{
            
            return redirect('admin/create-banner')->with('error','Please select an image !');
        }

        // $post->user_id=$request->user()->id;
        $data['name'] = $request->name;
        $data['image_path'] = $bannerImage;
        $data['status'] = 1;

        $res = $this->CommonAdminmodel->insertData($data, 'banners');
        // dd($res);

        return redirect('admin/banners')->with('success','Banner has been added');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner_edit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'banners');

        // dd($res);
        
        return view('backend.website.banner_update',[
            'data'=>$res,
            'title'=>'Banner Update',
            'meta_desc'=>'This is meta description for all Banners'
        ]);
    }

    // Update Data
    function banner_update_save(Request $request, $id){
        $request->validate([
            'name'=>'required',
        ]);

        // dd($request);

        // Post bannerImage
        $bannerImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $bannerImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/banner_image');
            $image1->move($dest1,$bannerImage);
        }

        // $post->user_id=$request->user()->id;
        $data['name'] = $request->name;
        $data['image_path'] = $bannerImage=='na'?$request->old_image:$bannerImage;
        $data['status'] = 1;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'banners');

        if($res){
        	return redirect('admin/banners')->with('success','Banner has been updated');
        }else{
        	return redirect('admin/banner/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    } 

 	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner_delete($id)
    {
        $res = $this->CommonAdminmodel->deleteData( $id, 'banners');
        if($res){
        	return redirect('admin/banners')->with('success','Banner has been deleted');
        }else{
        	return redirect('admin/banners')->with('error','Something wrong, please try again !');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bannerc_ontents()
    {
        

        $data = $this->CommonAdminmodel->getAllData('banners_contents');

        // dd($data);
        
        return view('backend.website.banners_contents',[
            'data'=>$data,
            'title'=>'All Banner Contents',
            'meta_desc'=>'This is meta description for all Banner Contents'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_banner_contents()
    {
        return view('backend.website.banners_contents_add');
    }

    // Save Data
    function banner_contents_add_save(Request $request){
        $request->validate([
            'position'=>'required',
            'contents'=>'required',
        ]);

        // dd($request);

        // Post banneContentsImage
        $banneContentsImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $banneContentsImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/banner_contents');
            $image1->move($dest1,$banneContentsImage);
        }else{
            
            return redirect('admin/create-banner-content')->with('error','Please select an image !');
        }

        // $post->user_id=$request->user()->id;
        $data['position'] = $request->position;
        $data['image'] = $banneContentsImage;
        $data['contents'] = $request->contents;

        $res = $this->CommonAdminmodel->insertData($data, 'banners_contents');
        // dd($res);

        return redirect('admin/banner-contents')->with('success','Banner Content has been added');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner_contents_edit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'banners_contents');

        // dd($res);
        
        return view('backend.website.banner_contents_update',[
            'data'=>$res,
            'title'=>'Banner Content Update',
            'meta_desc'=>'This is meta description for all Banners Content'
        ]);
    }


    // Update Data
    function banner_contents_update_save(Request $request, $id){
        $request->validate([
            // 'position'=>'required',
            'contents'=>'required',
        ]);

        // dd($request);

        // Post banneContentsImage
        $banneContentsImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $banneContentsImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/banner_contents');
            $image1->move($dest1,$banneContentsImage);
        }

        // $post->user_id=$request->user()->id;
        // $data['position'] = $request->position;
        $data['image'] = $banneContentsImage=='na'?$request->old_image:$banneContentsImage;
        $data['contents'] = $request->contents;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'banners_contents');

        if($res){
            return redirect('admin/banner-contents')->with('success','Banner Content has been updated');
        }else{
            return redirect('admin/banner-content/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        $data = $this->CommonAdminmodel->getAllData('about_us');

        // dd($data);
        
        return view('backend.website.about_us',[
            'data'=>$data,
            'title'=>'About Us',
            'meta_desc'=>'This is meta description for About Us'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAboutUs()
    {
        return view('backend.website.about_us_add',[
            'title'=>'Create About Us',
            'meta_desc'=>'This is meta description for About Us'
        ]);
    }

    // Save Data
    function aboutUsSave(Request $request){
        $request->validate([
            'title'=>'required',
            'contents'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['contents'] = $request->contents;

        $res = $this->CommonAdminmodel->insertData($data, 'about_us');
        // dd($res);

        if($res){
            return redirect('admin/about_us')->with('success','Content has been added');
        }else{
            return redirect('admin/create_about_us')->with('error','Something wrong, please try again !');
        }
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aboutUsEdit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'about_us');

        // dd($res);
        
        return view('backend.website.about_us_update',[
            'data'=>$res,
            'title'=>'About Us Content Update',
            'meta_desc'=>'This is meta description for About Us Content'
        ]);
    }

    // Update Data
    function aboutUsUpdateSave(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'contents'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['contents'] = $request->contents;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'about_us');

        if($res){
            return redirect('admin/about_us')->with('success','About Us Content has been updated');
        }else{
            return redirect('admin/about_us/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onlineFeePayment()
    {
        $data = $this->CommonAdminmodel->getAllDataWhere('online_contents',['type' => 'fee']);

        // dd($data);
        
        return view('backend.website.online.online_fee_payment',[
            'data'=>$data,
            'title'=>'Online Fee Payment',
            'meta_desc'=>'This is meta description for Online Fee Payment'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createonlineFeePayment()
    {
        return view('backend.website.online.online_fee_payment_add',[
            'title'=>'Create Online Fee Payment',
            'meta_desc'=>'This is meta description for Online Fee Payment'
        ]);
    }

    // Save Data
    function onlineFeePaymentSave(Request $request){
        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['type'] = "fee";

        $res = $this->CommonAdminmodel->insertData($data, 'online_contents');
        // dd($res);

        if($res){
            return redirect('admin/online_fee_payment')->with('success','Online Fee Payment has been added');
        }else{
            return redirect('admin/create_online_fee_payment')->with('error','Something wrong, please try again !');
        }
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onlineFeePaymentEdit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'online_contents');

        // dd($res);
        
        return view('backend.website.online.online_fee_payment_update',[
            'data'=>$res,
            'title'=>'Online Fee Payment Update',
            'meta_desc'=>'This is meta description for Online Fee Payment Content'
        ]);
    }

    // Update Data
    function onlineFeePaymentUpdateSave(Request $request, $id){

        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'online_contents');

        if($res){
            return redirect('admin/online_fee_payment')->with('success','Online Fee Payment Content has been updated');
        }else{
            return redirect('admin/online_fee_payment/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onlineContentDelete($id)
    {
        $exist_data = $this->CommonAdminmodel->getDatabyId($id, 'online_contents');
        // dd($exist_data);
        $res = $this->CommonAdminmodel->deleteData( $id, 'online_contents');
        if($res){
            if($exist_data->type == "fee"){
                return redirect('admin/online_fee_payment')->with('success','Data has been deleted');
            }else if ($exist_data->type == "result") {
                return redirect('admin/online_result')->with('success','Data has been deleted');
            }else if ($exist_data->type == "exam") {
                return redirect('admin/online_exam')->with('success','Data has been deleted');
            }
            
        }else{
            if($exist_data->type == "fee"){
                return redirect('admin/online_fee_payment')->with('error','Something wrong, please try again !');
            }else if ($exist_data->type == "result") {
                return redirect('admin/online_result')->with('error','Something wrong, please try again !');
            }else if ($exist_data->type == "exam") {
                return redirect('admin/online_exam')->with('error','Something wrong, please try again !');
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onlineResult()
    {
        $data = $this->CommonAdminmodel->getAllDataWhere('online_contents',['type' => 'result']);

        // dd($data);
        
        return view('backend.website.online.online_result',[
            'data'=>$data,
            'title'=>'Online Result',
            'meta_desc'=>'This is meta description for Online Result'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createonlineResult()
    {
        return view('backend.website.online.online_result_add',[
            'title'=>'Create Online Result',
            'meta_desc'=>'This is meta description for Online Result'
        ]);
    }

    // Save Data
    function onlineResultSave(Request $request){
        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['type'] = "result";

        $res = $this->CommonAdminmodel->insertData($data, 'online_contents');
        // dd($res);

        if($res){
            return redirect('admin/online_result')->with('success','Online Result has been added');
        }else{
            return redirect('admin/create_online_result')->with('error','Something wrong, please try again !');
        }
    } 


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onlineResultEdit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'online_contents');

        // dd($res);
        
        return view('backend.website.online.online_result_update',[
            'data'=>$res,
            'title'=>'Online Result Update',
            'meta_desc'=>'This is meta description for Online Result Content'
        ]);
    }

    // Update Data
    function onlineResultUpdateSave(Request $request, $id){

        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'online_contents');

        if($res){
            return redirect('admin/online_result')->with('success','Online Result Content has been updated');
        }else{
            return redirect('admin/online_result/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onlineExam()
    {
        $data = $this->CommonAdminmodel->getAllDataWhere('online_contents',['type' => 'exam']);

        // dd($data);
        
        return view('backend.website.online.online_exam',[
            'data'=>$data,
            'title'=>'Online Exam',
            'meta_desc'=>'This is meta description for Online Exam'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createonlineExam()
    {
        return view('backend.website.online.online_exam_add',[
            'title'=>'Create Online Exam',
            'meta_desc'=>'This is meta description for Online Exam'
        ]);
    }

    // Save Data
    function onlineExamSave(Request $request){
        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['type'] = "exam";

        $res = $this->CommonAdminmodel->insertData($data, 'online_contents');
        // dd($res);

        if($res){
            return redirect('admin/online_exam')->with('success','Online Exam has been added');
        }else{
            return redirect('admin/create_online_exam')->with('error','Something wrong, please try again !');
        }
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onlineExamEdit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'online_contents');

        // dd($res);
        
        return view('backend.website.online.online_exam_update',[
            'data'=>$res,
            'title'=>'Online Exam Update',
            'meta_desc'=>'This is meta description for Online Exam Content'
        ]);
    }


    // Update Data
    function onlineExamUpdateSave(Request $request, $id){

        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'online_contents');

        if($res){
            return redirect('admin/online_exam')->with('success','Online Exam Content has been updated');
        }else{
            return redirect('admin/online_exam/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePageArchives()
    {

        $data = $this->CommonAdminmodel->getAllData('home_page_arcive');

        // dd($data);
        
        return view('backend.website.archive.home_page_arcive',[
            'data'=>$data,
            'title'=>'Home Page Archive',
            'meta_desc'=>'This is meta description for Home Page Archive'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createHomePageArchives()
    {
        return view('backend.website.archive.home_page_arcive_add',[
            'title'=>'Add Home Page Archive',
            'meta_desc'=>'This is meta description for Home Page Archive'
        ]);
    }

    // Save Data
    function homePageArchivesSave(Request $request){
        $request->validate([
            'title'=>'required',
        ]);

        // dd($request);

        // Post bannerImage
        $archiveImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $archiveImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/home_archive');
            $image1->move($dest1,$archiveImage);
        }else{
            
            return redirect('admin/home_page_archives')->with('error','Please select an image !');
        }

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['image_path'] = $archiveImage;
        // $data['status'] = 1;

        $res = $this->CommonAdminmodel->insertData($data, 'home_page_arcive');
        // dd($res);

        if($res){
            return redirect('admin/home_page_archives')->with('success','Home Page Archive image has been added');
        }else{
            return redirect('admin/create_home_page_archive')->with('error','Something wrong, please try again !');
        }
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homePageArchivesEdit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'home_page_arcive');

        // dd($res);
        
        return view('backend.website.archive.home_page_arcive_update',[
            'data'=>$res,
            'title'=>'Home Page Archive Update',
            'meta_desc'=>'This is meta description for all Home Page Archive'
        ]);
    }

    // Update Data
    function homePageArchivesUpdateSave(Request $request, $id){
        $request->validate([
            'title'=>'required',
        ]);

        // dd($request);

        // Post bannerImage
        $archiveImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $archiveImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/home_archive');
            $image1->move($dest1,$archiveImage);
        }

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['image_path'] = $archiveImage=='na'?$request->old_image:$archiveImage;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'home_page_arcive');

        if($res){
            return redirect('admin/home_page_archives')->with('success','Home Page Archive image has been updated');
        }else{
            return redirect('admin/home_page_archives/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homePageArchivesDelete($id)
    {
        $res = $this->CommonAdminmodel->deleteData( $id, 'home_page_arcive');
        if($res){
            return redirect('admin/home_page_archives')->with('success','Home Page Archive image has been deleted');
        }else{
            return redirect('admin/home_page_archives')->with('error','Something wrong, please try again !');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allEvents()
    {
        $data = $this->CommonAdminmodel->getAllData('all_events');

        // dd($data);
        
        return view('backend.website.events.all_events',[
            'data'=>$data,
            'title'=>'Events',
            'meta_desc'=>'This is meta description for Events'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEvent()
    {
        return view('backend.website.events.events_add',[
            'title'=>'Create Event',
            'meta_desc'=>'This is meta description for Event'
        ]);
    }

    // Save Data
    function createEventSave(Request $request){
        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;

        $res = $this->CommonAdminmodel->insertData($data, 'all_events');
        // dd($res);

        if($res){
            return redirect('admin/all_events')->with('success','Event has been added');
        }else{
            return redirect('admin/create_online_exam')->with('error','Something wrong, please try again !');
        }
    } 

     /***
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function eventEdit($id)
    {
        $res = $this->CommonAdminmodel->getDatabyId($id, 'all_events');

        // dd($res);
        
        return view('backend.website.events.event_update',[
            'data'=>$res,
            'title'=>'Event Update',
            'meta_desc'=>'This is meta description for Event'
        ]);
    }


    // Update Data
    function eventUpdateSave(Request $request, $id){

        $request->validate([
            'title'=>'required',
            'link'=>'required',
        ]);

        // dd($request);

        // $post->user_id=$request->user()->id;
        $data['title'] = $request->title;
        $data['link'] = $request->link;
        $data['updated_at'] = date('Y-m-d');

        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, $id, 'all_events');

        if($res){
            return redirect('admin/all_events')->with('success','Event has been updated');
        }else{
            return redirect('admin/all_events/'.$id.'/edit')->with('error','Something wrong, please try again !');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eventDelete($id)
    {
        $res = $this->CommonAdminmodel->deleteData( $id, 'all_events');
        if($res){
            return redirect('admin/all_events')->with('success','Event has been deleted');
        }else{
            return redirect('admin/all_events')->with('error','Something wrong, please try again !');
        }
    }


    public function webSettings()
    {
        $res = $this->CommonAdminmodel->getWebSetting('web_settings');

        // dd($res);
        
        return view('backend.website.web_settings',[
            'data'=>$res,
            'title'=>'Web Settings',
            'meta_desc'=>'This is meta description for Web Settings'
        ]);
    }

    // Update Data
    function webSettingsSave(Request $request){

        $request->validate([
            'school_name'=>'required',
            'address'=>'required',
            'school_code'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        // dd($request);

        // Post bannerImage
        $logoImage='na';
        if($request->hasFile('logo')){
            $image1=$request->file('logo');
            $logoImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/web_settings');
            $image1->move($dest1,$logoImage);
        }

        // $post->user_id=$request->user()->id;
        $data['school_name'] = $request->school_name;
        $data['address'] = $request->address;
        $data['school_code'] = $request->school_code;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['logo'] = $logoImage=='na'?$request->old_logo:$logoImage;


        // dd($data);

        $res = $this->CommonAdminmodel->updatetData($data, 1, 'web_settings');

        if($res){
            return redirect('admin/web_settings')->with('success','Web Settings has been updated');
        }else{
            return redirect('admin/web_settings')->with('error','Something wrong, please try again !');
        }
        
    }

}
