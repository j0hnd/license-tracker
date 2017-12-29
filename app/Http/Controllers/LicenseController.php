<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FormLicenses;
use App\Licenses;
use App\States;
use App\Mail\SendReport;

use Excel;


class LicenseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = States::get_licenses();

        $expiring_licenses = Licenses::get_expiring_licenses($licenses);

        return view('License.index', compact('licenses', 'expiring_licenses'));
    }

    /**
     * Update license
     *
     * @param  FormLicenses $request
     * @return \Illuminate\Http\Response
     */
    public function update_license(FormLicenses $request)
    {
        $response = ['success' => false];

        try {

            if ($request->ajax()) {
                $form = $request->all();

                $success = false;

                // prepare data to save
                $license_number = strtoupper($form['license_number']);

                $expiration_date = date('Y-m-d', strtotime($form['expiration_date']));

                if (strtotime('now') > strtotime($form['expiration_date'])) {
                    $license_status = 0;
                } else {
                    $license_status = 1;
                }

                if ($request->isMethod('post')) {
                    $success = Licenses::create([
                        'state_id'        => $form['state_id'],
                        'license_number'  => $license_number,
                        'expiration_date' => $expiration_date,
                        'license_status'  => $license_status
                    ]);
                } elseif ($request->isMethod('put')) {
                    $license_obj = Licenses::where('state_id', $form['state_id']);
                    $license_info = $license_obj->first();

                    $license_info->license_number  = $license_number;
                    $license_info->expiration_date = $expiration_date;
                    $license_info->license_status  = $license_status;

                    $success = $license_info->save();
                }

                if ($success) {
                    $response = ['success' => true, 'message', 'License updated!'];
                } else {
                    $response['message'] = "Error in updating license...";
                }
            }

        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json($response);
    }

    /**
     * Reload list of licenses
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function reload(Request $request)
    {
        $response = ['success' => false];

        try {

            if ($request->ajax()) {
                $licenses = States::get_licenses();

                $list = view('Partials.Licenses._list', compact('licenses'))->render();

                $response = ['success' => true, 'data' => ['list' => $list]];
            }
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json($response);
    }

    /**
     * Send XLS to specified email address
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function send_report(Request $request)
    {
        $response = ['success' => false];

        try {

            if ($request->ajax()) {
                $form = $request->all();

                if (empty($form['email'])) {
                    $response['message'] = "Email address is empty";

                    return response()->json($response);
                }

                if (filter_var($form['email'], FILTER_VALIDATE_EMAIL) == false) {
                    $response['message'] = "Invalid email address format";

                    return response()->json($response);
                }


                $licenses_raw = States::get_licenses();

                $licenses = null;

                if ($licenses_raw->count()) {
                    foreach ($licenses_raw->get() as $i => $license) {
                        $licenses[$i]['state_name']      = $license->name;
                        $licenses[$i]['license_number']  = empty($license->license_number) ? 'No License Found' : $license->license_number;
                        $licenses[$i]['expiration_date'] = empty($license->expiration_date) ? 'No License Found' : $license->expiration_date;

                        if (empty($license->license_status)) {
                            $licenses[$i]['license_status'] = 'No License Found';
                        } else {
                            if (strtotime('now') > strtotime($license->expiration_date)) {
                                $licenses[$i]['license_status'] = 'No License Found';
                            } else {
                                $licenses[$i]['license_status'] = 'License Valid';
                            }
                        }
                    }

                    $report_date = date('mdY');

                    $filename = "Licenses-{$report_date}";

                    Excel::create($filename, function ($excel) use($licenses) {

                        $excel->sheet('ExportFile', function($sheet) use($licenses) {
                          $sheet->fromArray($licenses);
                      });

                    })->store('xls', storage_path('excel/export'));

                    Mail::to($form['email'])
                        ->send(new SendReport(['filename' => $filename, 'report_date' => $report_date])
                    );

                    $response = ['success' => true];
                }
            }

        } catch (\Exception $e) {
            throw $e;
        }


        return response()->json($response);
    }
}
