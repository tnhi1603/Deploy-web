<?php

namespace App\Console\Commands;

use App\Models\Voucher;
use Illuminate\Console\Command;

class UpdateVoucherStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voucher:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update voucher status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $vouchers_active = Voucher::where('start_date', '<', now())->where('end_date', '>', now())->get();

        foreach ($vouchers_active as $voucher) {
            // Cập nhật trạng thái của voucher ở đây (ví dụ: chuyển thành "Hết hạn")
            $voucher->update(['status' => 'active']);
        }

        $voucher_expired = Voucher::where('end_date', '<', now())->get();

        foreach ($voucher_expired as $voucher) {
            $voucher->update(['status' => 'expired']);
        }

        $this->info('Voucher statuses updated successfully.');
    }
}
