<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\ContactInformation;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interests;
use App\Models\Languages;
use App\Models\PersonalInformation;
use App\Models\Projects;
use App\Models\Skills;
class DownloadCvController extends Controller
{
    public function download($id)
    {
        if (!empty($id)) {
            $personal_information       = PersonalInformation::find($id)->toArray();
            $contact_information        = ContactInformation::where('user_id', $id)->get()->first()->toArray();
            $education_information      = Education::where('user_id', $id)->get()->toArray();
            $experience_information     = Experience::where('user_id', $id)->get()->toArray();
            $project_information        = Projects::where('user_id', $id)->get()->toArray();
            $skill_information          = Skills::where('user_id', $id)->get()->toArray();
            $language_information       = Languages::where('user_id', $id)->get()->toArray();
            $interest_information       = Interests::where('user_id', $id)->get()->toArray();

            $information['personal_info']      = $personal_information;
            $information['contact_info']       = $contact_information;
            $information['education_info']     = $education_information;
            $information['experience_info']    = $experience_information;
            $information['project_info']       = $project_information;
            $information['skill_info']         = $skill_information;
            $information['language_info']      = $language_information;
            $information['interest_info']      = $interest_information;
        }
        $pdf = Pdf::loadView('pdf.view', ['information' => $information]);
        return $pdf->download('cv.pdf');
    }
}
