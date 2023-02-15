<?php

namespace App\Http\Livewire\Admin\Order;

use App\Http\Livewire\User\Document\Index as DocumentIndex;
use App\Models\User;
use App\Models\Order;
use App\Models\School;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class Index extends Component
{
    public $filter, $openModal, $isSubmit = false;
    public $user, $selectedOrder, $orders, $receipt_delivery, $documents, $school, $i = 1;
    
    public function __construct()
    {
        $this->user = Auth::user();
        $this->school = School::where('user_id', $this->user->id)->first();
        $orders = Order::with('user', 'document', 'shipment')
            ->whereHas('user.profile', function($q){
                $q->where('school_id', $this->school->id);
            });

        if (request()->status) {
            $this->orders = $orders->where('status', request()->status)->get();
        }
        $this->orders = $orders->get();
    }
    
    public function updatedFilter(){
        if ($this->filter == 'all') {
            return redirect('/order');
        }else {
            return redirect('/order?status='.$this->filter);
        }
    }
    public function updatedReceiptDelivery(){
        $this->isSubmit = false;
        if (strlen($this->receipt_delivery) > 5) {
            $this->isSubmit = true;
        }
    }

    public function setOpenModal($modalUrl, $id){
        $order = Order::where('id', $id)->with('shipment')->first();
        $this->selectedOrder = $order;
        $this->openModal = $modalUrl;
    }
    
    public function setCloseModal(){
        $this->openModal = null;
        $this->selectedOrder = null;
    }
    
    public function download($fileUrl){
        $fileCheck = Storage::disk('public')->exists($fileUrl);
        if ($fileCheck) {
            return Storage::disk('public')->download($fileUrl);
        }else {
            Notification::make() 
                ->title('Permintaan Gagal')
                ->body('Tidak dapat mengunduh dokumen')
                ->danger()
                ->duration(5000)
                ->send();
        }
    }
    
    public function update($status){
        if ($status == "Failed") {
            $update = $this->selectedOrder->update([
                'status' => $status
            ]);
            $update = $this->selectedOrder->shipment->update([
                'status' => $status
            ]);
        }
        if ($status == "Delivery") {
            $update = $this->selectedOrder->update([
                'status' => $status
            ]);
            $update = $this->selectedOrder->shipment->update([
                'status' => $status,
                'receipt_delivery' => $this->receipt_delivery
            ]);
        }
        $message = 'Update Status Pesanan';
        if ($update) {
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/order');
        }else {
            Notification::make() 
                ->title($message. ' Gagal')
                ->body('Terdapat gangguan pada sistem')
                ->danger()
                ->duration(5000)
                ->send();
        }
    }

    public function render()
    {
        return view('livewire.admin.order.index');
    }
}