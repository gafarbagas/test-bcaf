<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function index()
    {
        $datas = Submission::all();
        return view('pages.sub.index', compact('datas'));
    }

    public function create()
    {
        return view('pages.sub.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'identity_number' => 'required',
            'birthdate' => 'required',
            'marriage_status' => 'required',
            'partner_name' => 'required',
            'partner_identity_number' => 'required',
            'dealer' => 'required',
            'vehicle_brand' => 'required',
            'vehicle_model' => 'required',
            'vehicle_type' => 'required',
            'vehicle_color' => 'required',
            'vehicle_price' => 'required',
            'insurance' => 'required',
            'down_payment' => 'required',
            'installment_time' => 'required',
            'installment_amount' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'identity_number.required' => 'NIK harus diisi',
            'birthdate.required' => 'Tgl. Lahir harus diisi',
            'marriage_status.required' => 'Status Pernikahan harus diisi',
            'partner_name.required' => 'Nama Pasangan harus diisi',
            'partner_identity_number.required' => 'NIK Pasangan harus diisi',
            'dealer.required' => 'Dealer harus diisi',
            'vehicle_brand.required' => 'Merk Kendaraan harus diisi',
            'vehicle_model.required' => 'Model Kendaraan harus diisi',
            'vehicle_type.required' => 'Tipe Kendaraan harus diisi',
            'vehicle_color.required' => 'Warna Kendaraan harus diisi',
            'vehicle_price.required' => 'Harga Kendaraan harus diisi',
            'insurance.required' => 'Asuransi harus diisi',
            'down_payment.required' => 'Down Payment harus diisi',
            'installment_time.required' => 'Jangka Waktu harus diisi',
            'installment_amount.required' => 'Jumlah Angsuran harus diisi',
        ]);

        $randomString = Str::random(6);
        $existingRecord = Submission::where('sub_code', $randomString)->first();

        if ($existingRecord) {
            $randomString = Str::random(6);
        }

        $sub = Submission::create($request->all());
        $sub->sub_code = $randomString;
        $sub->save();
        return redirect()->route('sub.index');
    }

    public function show($id)
    {
        if(Auth::user()->role_id !=2) {
            return redirect()->route('sub.index');
        }
        $id = Crypt::decrypt($id);
        $sub = Submission::find($id);
        return view('pages.sub.show', compact('sub'));
    }

    public function approval($id)
    {
        if(Auth::user()->role_id !=2) {
            return redirect()->route('sub.index');
        }
        $id = Crypt::decrypt($id);
        $sub = Submission::find($id);
        $sub->approval = 1;
        $sub->save();
        return view('pages.sub.edit', compact('sub'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $sub = Submission::find($id);
        return view('pages.sub.edit', compact('sub'));
    }

    public function update(Request $request, $id)
    {
        $sub = Submission::find($id);
        $request->validate([
            'name' => 'required',
            'identity_number' => 'required',
            'birthdate' => 'required',
            'marriage_status' => 'required',
            'partner_name' => 'required',
            'partner_identity_number' => 'required',
            'dealer' => 'required',
            'vehicle_brand' => 'required',
            'vehicle_model' => 'required',
            'vehicle_type' => 'required',
            'vehicle_color' => 'required',
            'vehicle_price' => 'required',
            'insurance' => 'required',
            'down_payment' => 'required',
            'installment_time' => 'required',
            'installment_amount' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'identity_number.required' => 'NIK harus diisi',
            'birthdate.required' => 'Tgl. Lahir harus diisi',
            'marriage_status.required' => 'Status Pernikahan harus diisi',
            'partner_name.required' => 'Nama Pasangan harus diisi',
            'partner_identity_number.required' => 'NIK Pasangan harus diisi',
            'dealer.required' => 'Dealer harus diisi',
            'vehicle_brand.required' => 'Merk Kendaraan harus diisi',
            'vehicle_model.required' => 'Model Kendaraan harus diisi',
            'vehicle_type.required' => 'Tipe Kendaraan harus diisi',
            'vehicle_color.required' => 'Warna Kendaraan harus diisi',
            'vehicle_price.required' => 'Harga Kendaraan harus diisi',
            'insurance.required' => 'Asuransi harus diisi',
            'down_payment.required' => 'Down Payment harus diisi',
            'installment_time.required' => 'Jangka Waktu harus diisi',
            'installment_amount.required' => 'Jumlah Angsuran harus diisi',
        ]);

        $sub->update($request->all());
        return redirect()->route('sub.index');
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $sub = Submission::find($id);
        $sub->delete();
        return view('pages.sub.index');
    }
}
