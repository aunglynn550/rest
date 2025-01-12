<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class DownloadInvoiceController extends Controller
{
    
    public function index()
    {
        return Pdf::view('frontend.pdfs.invoice')
            ->format('a4')
            ->name('gjmyanmar-invoice.pdf');
    }
}
