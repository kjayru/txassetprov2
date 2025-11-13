@php
use App\Models\Course;
@endphp
@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/orders">Orders</a></li>
              <li class="breadcrumb-item active">Show order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if(session('info'))
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('info')}}
                    </div>
                </div>
            </div>
        </div>
    @endif



        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        <i class="fas fa-globe"></i> Tap Security
                        <small class="float-right">Date: {{ $order->created_at}}</small>
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      From

                      <address>

                        11503 Jones Maltsberger Rd, Ste 1158<br>
                        San Antonio, TX 78216<br>
                        Phone: Tel: (210) 399-1116<br>
                        Email: admin@txassetpro.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      To
                      <address>
                        <strong>{{ $order->user->name }}</strong><br>
                        {{ @$order->user->profile->address1}}<br>
                        {{ @$order->user->profile->city }}, {{ @$order->user->profile->zipcode}}<br>
                        Phone: {{ @$order->user->profile->phone}}<br>
                        Email: {{ @$order->user->email }}
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice #{{ $order->txn_id}}</b><br>
                      <br>
                      <b>Order ID:</b> {{ $order->id}}<br>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Qty</th>
                          <th>Product</th>



                          <th>Currency</th>
                          <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>1</td>
                          <td>{{ Course::getcourse($order->course)->titulo}}</td>


                          <td>USD</td>
                          <td>$ {{Course::getcourse($order->course)->precio}}</td>
                        </tr>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-7">
                      <p class="lead">Payment Methods:</p>
                      <img src="data:image/jpeg;base64,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" alt="STRIPE">


                    </div>
                    <!-- /.col -->
                    <div class="col-5">

                      <div class="table-responsive">
                        <table class="table">
                          <tbody>

                          <tr>
                            <th>Total:</th>
                            <td>${{ $order->price }}</td>
                          </tr>
                        </tbody></table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-12">
                      <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                    </div>
                  </div>
                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
    <!-- /.content -->
  </div>





@endsection





