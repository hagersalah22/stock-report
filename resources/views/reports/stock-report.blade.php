@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Stock Report')

@section('vendor-style')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
<div class="row">
  <div class="col-xxl-8 mb-6 order-0">
    <div class="card">
      <div class="d-flex align-items-start row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary mb-3">Hi John! 🎉</h5>
            <p class="mb-6">Welcome to your.<br>Stock Report Page.</p>
            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-6">
            <img src="{{ asset('assets/img/illustrations/man-with-laptop.png') }}" height="175" class="scaleX-n1-rtl" alt="View Badge User">
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Total Sales -->
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <p class="mb-1">Total Sales</p>
            <h4 class="card-title mb-3">${{ $totalSales }}</h4>
          </div>
        </div>
      </div>
     <!-- Total Stock -->
      <div class="col-lg-6 col-md-12 col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('assets/img/icons/unicons/wallet-info.png') }}" alt="wallet info" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <p class="mb-1">Total Stock</p>
            <h4 class="card-title mb-3">${{ $totalStock }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Revenue -->
  <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="m-0 me-2">Stock Trends Over Time</h5>
      </div>
      <div class="card-body">
        <canvas id="stockTrendsChart"></canvas>
      </div>
    </div>
  </div>
   <!-- Total Purchases -->
  <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
    <div class="row">
      <div class="col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('assets/img/icons/unicons/paypal.png') }}" alt="paypal" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <p class="mb-1">Total Purchases</p>
            <h4 class="card-title mb-3">${{ $totalPurchases }}</h4>
          </div>
        </div>
      </div>
      <!-- Total Adjustments -->
      <div class="col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <p class="mb-1">Total Adjustments</p>
            <h4 class="card-title mb-3">{{ $totalAdjustments }}</h4>
          </div>
        </div>
      </div>
      <<!-- Total Sales Report in this year -->>
      <div class="col-12 mb-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex flex-column justify-content-between h-100">
              <div>
                <div class="card-title mb-4">
                  <h5 class="text-nowrap mb-1">Total Sales Report</h5>
                  <span class="badge bg-label-warning">YEAR {{ $currentYear }}</span>
                </div>
                <div class="mt-auto">
                  <span class="text-success text-nowrap fw-medium">
                    <i class='bx bx-up-arrow-alt'></i>
                    {{ round(($totalSales / 1000), 2) }}%
                  </span>
                  <h4 class="mb-0">${{ number_format($totalSales / 1000, 1) }}k</h4>
                </div>
              </div>
              <div class="mt-4">
                <canvas id="ReportChart" style="width: 100%; height: 200px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Transaction History Table -->
  <div class="col-md-8">
    <div class="card h-100">
      <h5 class="card-header">Transaction History</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Transaction Type</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach($transactions as $transaction)
              <tr>
                <!-- Displaying product icon and name dynamically -->
                <td>
                  @php
                    $productIcons = [
                      'Mobile' => 'bx bx-mobile-alt text-info',
                      'Laptop' => 'bx bx-laptop text-primary',
                      'Tablet' => 'bx bx-tablet text-success',
                      'Desktop' => 'bx bx-desktop text-secondary',
                      'Headphones' => 'bx bx-headphone text-warning',
                      'Camera' => 'bx bx-camera text-danger',
                      'Smartwatch' => 'bx bx-watch text-success',
                      'Accessories' => 'bx bx-plug text-muted'
                    ];
                    $productIcon = $productIcons[$transaction->product->name] ?? 'bx bx-box';
                  @endphp
                  <i class="{{ $productIcon }} bx-md me-4"></i>
                  <span>{{ $transaction->product->name }}</span>
                </td>

                <!-- Transaction Type with status badge styling -->
                <td>
                  @php
                    $badgeColors = [
                      'open_stock' => 'bg-label-primary',
                      'purchase' => 'bg-label-info',
                      'sell' => 'bg-label-success',
                      'sell_return' => 'bg-label-warning',
                      'purchase_return' => 'bg-label-danger',
                      'adjustment' => 'bg-label-secondary',
                    ];
                    $badgeColor = $badgeColors[$transaction->type] ?? 'bg-label-dark';
                  @endphp
                  <span class="badge {{ $badgeColor }}">
                    {{ ucfirst(str_replace('_', ' ', $transaction->type)) }}
                  </span>
                </td>

                <!-- Quantity and Amount columns -->
                <td>{{ $transaction->quantity }}</td>
                <td>${{ number_format($transaction->amount, 2) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Transactions Card -->
  <div class="col-md-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Order Statistics</h5>
        <p class="card-subtitle">{{ number_format($totalSales, 2) }} Total Sales</p>
        <div class="dropdown">
          <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded bx-lg"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-4">
        <div class="d-flex justify-content-center align-items-center mb-6">
          <canvas id="topProductChartCanvas" style="max-width: 300px;"></canvas>
        </div>
        <ul class="p-0 m-0">
          @foreach($topProducts as $product)
            <li class="d-flex align-items-center mb-5">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-box'></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-0">{{ $product['product']->name }}</h6>
                  <small>Sold: {{ $product['total_quantity'] }}</small>
                </div>
                <div class="user-progress">
                  <h6 class="mb-0">{{ number_format($product['total_quantity']) }}</h6>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <!--/ Transactions -->
</div>

@include('reports.charts-scripts') 

@endsection