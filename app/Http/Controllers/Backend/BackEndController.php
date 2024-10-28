<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Info;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;

class BackEndController extends Controller
{
    public function home(){
        return view('backend.home');
    }
    public function userCv(){
        return view('backend.info');
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function saveInfo(Request $request){
        $info = Info::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'country'=>$request->country,
            'github'=>$request->github,
            'linkedin'=>$request->linkedin,
        ]);
        return redirect()->route('home')->with('success', 'Data Saved successfully!');
    }
    public function saveSkill(Request $request){
        $info = Skill::create([
            'user_id'=>Auth::user()->id,
            'skill'=>$request->skills,
            'soft_skill'=>$request->soft_skill,
        ]);
        return redirect()->route('home')->with('success', 'Skills Saved successfully!');
    }

    public function saveEdu(Request $request){
        $edu = Education::create([
            'user_id'=>Auth::user()->id,
            'country'=>$request->country,
            'university'=>$request->university,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'field'=>$request->field
        ]);
        return redirect()->route('home')->with('success', 'Education Saved successfully!');
    }
    public function saveProject(Request $request){
        $proj = Project::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'link'=>$request->link
        ]);
        return redirect()->route('home')->with('success', 'Project Saved successfully!');
    }
    public function saveExp(Request $request){
        $exp = Experience::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'company'=>$request->company
        ]);
        return redirect()->route('home')->with('success', 'Experience Saved successfully!');
    }
    public function saveCertificate(Request $request){
        $exp = Certificate::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'date'=>$request->date,
            'company'=>$request->company
        ]);
        return redirect()->route('home')->with('success', 'Certificate Saved successfully!');
    }

    public function updateInfo(Request $request){
        $id = $request->id;
        $validate=$request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
        ]);
        if(!$validate){
            return redirect()->back()->with('error', 'Something Error!');
        }
         Info::findOrFail($id)->update([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'country'=>$request->country,
            'github'=>$request->github,
            'linkedin'=>$request->linkedin,
        ]);
        return redirect()->back()->with('success', 'Data Updated successfully!');
    }

    public function updateSkill(Request $request){
        $id = $request->id;
         Skill::findOrFail($id)->update([
            'user_id'=>Auth::user()->id,
            'skill'=>$request->skill,
            'soft_skill'=>$request->soft_skill
        ]);
        return redirect()->back()->with('success', 'Skills Updated successfully!');
    }
    public function updateEdu(Request $request)
    {
        $validate=$request->validate([
            'country' => 'required|string',
            'university' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'field' => 'required|string',
        ]);
        if(!$validate){
            return redirect()->back()->with('error', 'Something Error!');
        }
        $id = $request->id;
        Education::findOrFail($id)->update([
            'user_id' => Auth::user()->id,
            'country' => $request->country,
            'university' => $request->university,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'field' => $request->field,
        ]);
    
        return redirect()->back()->with('success', 'Education Updated successfully!');
    }
    public function updateProject(Request $request)
    {
        $validate=$request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        if(!$validate){
            return redirect()->back()->with('error', 'Something Error!');
        }
        $id = $request->id;
        Project::findOrFail($id)->update([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'link' => $request->link,
        ]);
    
        return redirect()->back()->with('success', 'Project Updated successfully!');
    }
    public function updateExperience(Request $request)
    {
        $validate=$request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        if(!$validate){
            return redirect()->back()->with('error', 'Something Error!');
        }
        $id = $request->id;
        Experience::findOrFail($id)->update([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'company' => $request->company,
        ]);
    
        return redirect()->back()->with('success', 'Experience Updated successfully!');
    }
    public function updateCertificate(Request $request)
    {
        $validate=$request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'company' => 'required|string',
        ]);
        if(!$validate){
            return redirect()->back()->with('error', 'Something Error!');
        }
        $id = $request->id;
        Certificate::findOrFail($id)->update([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'company' => $request->company,
        ]);
    
        return redirect()->back()->with('success', 'Certificate Updated successfully!');
    }
    
    public function editInfo(){
        $info = Info::where('user_id',Auth::user()->id)->first();
        return view ('backend.editInfo',compact('info'));
    }
    public function editEdu(){
        $edu = Education::where('user_id',Auth::user()->id)->first();
        return view ('backend.editEdu',compact('edu'));
    }
    public function editSkill() {
        $skills = Skill::where('user_id', Auth::user()->id)->first();
        return view('backend.editSkill', compact('skills'));
    }
    public function editProject() {
        $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('backend.editProject', compact('projects'));
    }
    public function editProjectDetails($id) {
        $projects = Project::where('id', $id)->first();
        return view('backend.editProjectDetails', compact('projects'));
    }
    public function editExperienceDetails($id) {
        $exps = Experience::where('id', $id)->first();
        return view('backend.editExperienceDetails', compact('exps'));
    }
    public function editCertificateDetails($id) {
        $certify = Certificate::where('id', $id)->first();
        return view('backend.editCertificateDetails', compact('certify'));
    }
    public function editExperience() {
        $exps = Experience::where('user_id', Auth::user()->id)->get();
        return view('backend.editExperience', compact('exps'));
    }
    public function editCertificate() {
        $certifys = Certificate::where('user_id', Auth::user()->id)->get();
        return view('backend.editCertificate', compact('certifys'));
    }
    public function userProfile(){
        return view('backend.profile');
    }
    public function userSkill(){
        return view('backend.skills');
    }
    public function userEdu(){
        return view('backend.edu');
    }
    public function userProject(){
        return view('backend.projects');
    }
    public function userExp(){
        return view('backend.experience');
    }
    public function userCertificate(){
        return view('backend.certificate');
    }

    public function cv(){
        return view('backend.cv');
    }
    public function downloadCV(){
        $user = Auth::user();
        // Load view with the user data
        $pdf = Pdf::loadView('backend.cv', compact('user'));

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('cv.pdf');

    }
}
