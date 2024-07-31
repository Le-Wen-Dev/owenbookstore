<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function laylsgd()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://oauth.casso.vn/v2/transactions?fromDate=2024-07-16&page=1&pageSize=10&sort=ASC",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Apikey AK_CS.6568ee804f2311ef9068f9e08e26656f.CqLQMOkRJrqC9hWJNBRM76RnEKtyszRmdQzWu35uZkPCjmPyWRjN0myASTMB2H1oogzSzkJA",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['error' => 'cURL Error: ' . $err], 500);
        } else {
            $lsgd = json_decode($response, true); // Chuyển đổi thành mảng

            // Kiểm tra dữ liệu và cấu trúc
            if (isset($lsgd['data']['records']) && is_array($lsgd['data']['records'])) {
                // Lưu dữ liệu vào cơ sở dữ liệu
                $this->storeBankDataInDatabase($lsgd['data']['records']);

                // Hiển thị dữ liệu
                return view('bank', ['lsgd' => $lsgd['data']['records']]);
            } else {
                return view('bank', ['error' => 'No records found or invalid data structure.']);
            }
        }
    }

    protected function storeBankDataInDatabase(array $records)
    {
        foreach ($records as $record) {
            Bank::updateOrCreate(
                ['tid' => $record['tid']], // Sử dụng 'tid' làm khóa chính
                [
                    'description' => $record['description'],
                    'amount' => $record['amount'],
                    'bank_sub_acc_id' => $record['bankSubAccId'],
                    'corresponsive_name' => $record['corresponsiveName'],
                    'corresponsive_account' => $record['corresponsiveAccount'],
                    'corresponsive_bank_id' => $record['corresponsiveBankId'],
                    'corresponsive_bank_name' => $record['corresponsiveBankName'],
                    'bank_code_name' => $record['bankCodeName'],
                ]
            );
        }
    }
}