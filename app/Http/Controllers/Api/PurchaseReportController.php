<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PurchaseReportController extends Controller {
    public function generateReport(Request $request, $format) {
        try {
            $purchases = Purchase::purchasesLastMonth();

            if ($format === 'json') {
                $filename = time() . '_file.json';

                Storage::disk('local')->put($filename, json_encode($purchases));
                if (Storage::disk('local')->exists($filename)) {
                    $headers = [
                        "Content-Type" => "application/json"
                    ];
                    return Storage::disk('local')->download($filename, $filename, $headers);
                }
            } elseif ($format === 'csv') {

                $headers = array(
                    'Content-Type' => 'text/csv'
                );

                $filename = time() . '_file.csv';
                $path = storage_path('app/') . $filename;
                $handle = fopen($path, 'w');

                fputcsv($handle, ['Product', 'Count', 'Purchase Date']);

                foreach ($purchases as $purchase) {
                    fputcsv($handle, [
                        $purchase->product,
                        $purchase->count,
                        $purchase->purchase_date,
                    ]);
                }
                fclose($handle);

                return Response::download($path, $filename, $headers);
            } else {
                return response()->json([
                    "status" => false,
                    'message' => 'Unsupported format. Supported formats: json, csv'
                ])->setStatusCode(400);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e
            ])->setStatusCode(500);
        }
    }
}