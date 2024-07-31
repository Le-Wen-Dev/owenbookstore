<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Bank;

class FetchAndStoreBankData extends Command
{
    protected $signature = 'fetch:bank-data';
    protected $description = 'Fetch bank transaction data and store it in the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Apikey AK_CS.6568ee804f2311ef9068f9e08e26656f.CqLQMOkRJrqC9hWJNBRM76RnEKtyszRmdQzWu35uZkPCjmPyWRjN0myASTMB2H1oogzSzkJA',
            'Content-Type' => 'application/json',
        ])->get('https://oauth.casso.vn/v2/transactions', [
            'fromDate' => '2024-07-16',
            'page' => 1,
            'pageSize' => 10,
            'sort' => 'ASC',
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['data']['records']) && is_array($data['data']['records'])) {
                foreach ($data['data']['records'] as $record) {
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
                $this->info('Dữ liệu đã được lưu thành công.');
            } else {
                $this->error('Dữ liệu không hợp lệ.');
            }
        } else {
            $this->error('Lỗi khi gọi API: ' . $response->body());
        }
    }
}