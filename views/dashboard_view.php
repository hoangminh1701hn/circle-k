<?php if ($admin_role == 'CuaHangTruong') { ?>

<div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Nhân Viên</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php $demacc=$obj->count_user();
                            echo $demacc;
                          ?></h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"></h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-account-multiple text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Đơn Xin Nghỉ</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php $demnp=$obj->count_xinnghiphep();
                            echo $demnp;
                          ?></h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"></h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-file-send text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Lương chưa thanh toán</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php
                            $demtt=$obj->count_chuathanhtoan();
                            echo $demtt;
                          
                          ?></h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"></h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-currency-usd text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 <?php } ?>
 <?php if ($admin_role == 'NhanVien') { ?>

<div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Lương Trong Tháng</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php $demluong=$obj->sum_luongThucNhan($admin_id);
                            echo $demluong;
                          ?>.000đ</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"></h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-currency-usd text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Tổng tiền phạt</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php $tienphat=$obj->tongtien_phat($admin_id);
                            echo $tienphat;
                          ?>.000đ</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"></h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-arrow-down text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Tổng tiền thưởng</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php
                             $thuong = $obj->tongtien_thuong($admin_id);
                            echo $thuong;
                          
                          ?>.000đ</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"></h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-arrow-up text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 <?php } ?>