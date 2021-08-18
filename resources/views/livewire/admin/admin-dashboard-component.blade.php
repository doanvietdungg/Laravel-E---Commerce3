<div>
    <div class="content">
        <style>
            .content {
              padding-top: 40px;
              padding-bottom: 40px;
            }
            .icon-stat {
                display: block;
                overflow: hidden;
                position: relative;
                padding: 15px;
                margin-bottom: 1em;
                background-color: #fff;
                border-radius: 4px;
                border: 1px solid #ddd;
            }
            .icon-stat-label {
                display: block;
                color: #999;
                font-size: 13px;
            }
            .icon-stat-value {
                display: block;
                font-size: 28px;
                font-weight: 600;
            }
            .icon-stat-visual {
                position: relative;
                top: 22px;
                display: inline-block;
                width: 32px;
                height: 32px;
                border-radius: 4px;
                text-align: center;
                font-size: 16px;
                line-height: 30px;
            }
            .bg-primary {
                color: #fff;
                background: #d74b4b;
            }
            .bg-secondary {
                color: #fff;
                background: #6685a4;
            }

            .icon-stat-footer {
                padding: 10px 0 0;
                margin-top: 10px;
                color: #aaa;
                font-size: 12px;
                border-top: 1px solid #eee;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Total Revenue</span>
                        <span class="icon-stat-value">${{ $totalrevenue }}</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Total Sales</span>
                        <span class="icon-stat-value">{{ $totalsales }}</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Today Revenue</span>
                        <span class="icon-stat-value">${{ $todayrevenue }}</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="icon-stat">
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Today Sales</span>
                        <span class="icon-stat-value">{{ $todaysale }}</span>
                      </div>
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                      </div>
                    </div>
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
             <div class="panel panel-default">
                 @if (session()->has('message'))
                 <div class="alert alert-success" role="alert" >{{ Session::get('message') }}</div>

                 @endif
               

                 <div class="panel-body">
                     <table class="table table-striped">
                         <thead>
                             <tr>
                                <th>Order ID</th>
                                <th>SubTotal</th>
                                <th>discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Zip code</th>
                                <th>status</th>
                                <th>Date</th>
                                <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($order as $item)
                                <tr>
                                   <td>{{ $item->id }}</td>
                                   <td>{{ $item->subtotal }}</td>
                                   <td>{{ $item->discount }}</td>
                                   <td>{{ $item->tax }}</td>

                                   <td>{{ $item->total }}</td>
                                   <td>{{ $item->first_name }}</td>
                                   <td>{{ $item->last_name }}</td>
                                   <td>{{ $item->mobile }}</td>
                                   <td>{{ $item->email }}</td>
                                   <td>{{ $item->zip_code }}</td>
                                   <td>{{ $item->status }}</td>
                                   <td>{{ $item->created_at }}</td>

                                    <td ><a href="/user/AllOrder/{{ $item->id }}"  class="btn btn-success">Detail Order</a></td>
                                    <td> <button type="button" onclick="confirm('Are you sure') || event.stopImmediatePropagation()"    class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"  wire:click=delete({{ $item->id }})>
                                        Delete
                                      </button></td>
                                </tr>
                             @endforeach
                         </tbody>
                     </table>

                </div>

                 </div>
             </div>
            </div>
        </div>
    </div>
</div>
