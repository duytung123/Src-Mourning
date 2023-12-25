<?php

namespace App\Http\Controllers;

use App\Models\ChiefMournerRelationship;
use App\Models\Classification;
use App\Models\Company;
use App\Models\ContactInfo;
use App\Models\PassedAwayRelationship;
use Nette\Utils\DateTime;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfOutputController extends Controller
{
  /**
   * @param Request $request
   */
    private function classifications(): array
    {
        $data = Classification::where('deleted_at', null)
            ->orderBy('sort')
            ->get();

        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->classification;
        }
        return $res;
    }

    private function companies(): array
    {
        $data = Company::where('deleted_at', null)
            ->orderBy('sort')
            ->get();
        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->company;
        }
        return $res;
    }

    private function chiefMournerRelationship(): array
    {
        $data = ChiefMournerRelationship::where('deleted_at', null)
            ->orderBy('sort')
            ->get();

        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->relationship;
        }
        return $res;
    }

    private function passedAwayRelationship(): array
    {
        $data = PassedAwayRelationship::where('deleted_at', null)
            ->orderBy('sort')
            ->get();

        $res = array();
        foreach ($data as $array) {
            $res[$array->id] = $array->relationship;
        }
        return $res;
    }

    private function showDate($date)
    {
        $week = ['日', '月', '火', '水', '木', '金', '土'];
        if ($date) {
            $res = new DateTime($date);
            return $res->format('Y年n月j日（' .
                $week[(int)date_format($res, 'w')]
                . '）');

        } else {
            return false;
        }
    }

    private function showDatetime($date)
    {
        $week = ['日', '月', '火', '水', '木', '金', '土'];
        if ($date) {
            $res = new DateTime($date);
            return $res->format('Y年n月j日（' .
                $week[(int)date_format($res, 'w')]
                . '）H:i');

        } else {
            return false;
        }
    }


    public function output(Request $request)
  {
//    session()->flush();
    $data = ContactInfo::find(decrypt($request['id']));

    // referrer判定
    $isManager = $request -> headers -> get("php-auth-user") === "manager";

    if($isManager) {
        if($request->session() -> has("edit_member")) {
            if(decrypt($request->session() -> get("edit_member")) !== decrypt($request['id'])) {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    if((int)$data['related_employee_no'] != (int)decrypt($request['no']) || (int)$data['final_confirmation'] != 1){
        return redirect('admin/list');
    }
    $val['reception_datetime'] = $this->showDatetime($data['reception_datetime']);
    $val['classification'] = $this->classifications()[$data['classification']];
    $val['company'] = $this->companies()[$data['company']];
    $val['passed_away_relationship'] = $this->passedAwayRelationship()[$data['passed_away_relationship']];
    if($data['chief_mourner_relationship']){
        $val['chief_mourner_relationship'] = $this->chiefMournerRelationship()[$data['chief_mourner_relationship']];
    } else {
        $val['chief_mourner_relationship'] ='';
    }

    $val['passed_away_date'] = $this->showDate($data['passed_away_date']);
    if($data['wake_date']){
        $val['wake_date'] = $this->showDate($data['wake_date']);
    } else {
        $val['wake_date'] = '';
    }
    if($data['funeral_date']){
        $val['funeral_date'] = $this->showDate($data['funeral_date']);
    } else {
        $val['funeral_date'] = '';
    }

    $pdf = PDF::loadView('pdfOutput', [
        'data'=>$data,
        'val'=>$val,
        ]);
    $pdf->add_info('Producer', 'mgu');
    return $pdf->stream('title.pdf');
  }
}
