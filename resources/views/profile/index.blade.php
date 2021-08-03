@extends('layouts.app')
<div class="details">
  <div id="background">
    <img src="/images/profile.png" alt="John Doe" class="profile-pic">
    <h1 class="heading">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h1>
    <div class="location">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12 ,2Z"></path>
      </svg>
      <p>{{Auth::user()->address}}</p>
    </div>
  </div>
  <div class="stats">
    <div class="col-4">
      <h4>{{Auth::user()->point}}</h4>
      <h4><i class="fas fa-coins"></i> Coin </h4>
    </div>
    @if(!empty(Auth::user()->vip) && Auth::user()->vip->end_day >= date('Y-m-d'))
    <?php
    $now = time();
    $user_date = strtotime(Auth::user()->vip->end_day);
    $vip_day = abs($user_date - $now);
    ?>
    <div class="col-4">
      <h4><?php echo round($vip_day / (60 * 60 * 24)); ?></h4>
      <h4><i class="fas fa-gem"></i> Days </h4>
    </div>
    @else
    <div class="col-4">
      <h4>&nbsp</h4>
      <h4>Basic Account </h4>
    </div>
    @endif
    <div class="col-4">
      <h4>100</h4>
      <h4><i class="fas fa-book"></i> Leaned </h4>
    </div>
  </div>
</div>

<?php
$vipBenefits = [
  '10 Coin For Daily Rewards',
  'No Limit Lessons/Day',
  'Fast Support Time',
  'Join The Monthly Leaderboard',
];
?>

<div class="css-od2ibp-Container e1un6ycg0">
  <div class="css-tpqd6g-ItemOuterContainer e1un6ycg2 col-lg-3">
    <div class="css-ww32ah-ItemTop e1un6ycg1"></div><a href="" class="css-rl1cnm">
      <div class="css-1pclwzr-ItemHeader e1un6ycg3">
        <h3>Free</h3>
      </div>
      <div class="css-e2tnif-ItemBody e1un6ycg4">
        <div class="css-15dzmog-PriceContainer e1un6ycg5" height="139">
          <div class="price-text">
            <p>0 <sup>VNĐ</sup></p>
          </div>
        </div>
        <hr class="css-g8zt6o-PriceSeparator e1un6ycg6">
        <div class="benefits">
          <div class="css-4kdkqr-FeatureList e1un6ycg7">
            <ul>
              <li><i class="fas fa-check dim"></i><span class="false false"> <span class="false dim"> 5 Coin For Daily Rewards</span></li>
              <li><i class="fas fa-check dim"></i><span class="false false"> <span class="false dim"> Limit Of 3 Lessons/Day</span></li>
              <li><i class="fas fa-check dim"></i><span class="false false"> <span class="false dim"> Normal Support Time</span></li>
            </ul>
          </div>
        </div>
      </div>
    </a>
    <div class="css-1xqsvmv-ItemFooter e1un6ycg10"></div>
  </div>
  <div class="css-tpqd6g-ItemOuterContainer e1un6ycg2 col-lg-3">
    <div class="css-ww32ah-ItemTop e1un6ycg1"></div>
    <div class="css-vww6o0-ItemHeader e1un6ycg3">
      <h3>Vip For A Week</h3>
    </div>
    <div class="css-e2tnif-ItemBody e1un6ycg4">
      <div class="css-15dzmog-PriceContainer e1un6ycg5" height="139">
        <div class="price-text">
          <p>70.000 <sup>VNĐ</sup></p>
        </div>
      </div>
      <hr class="css-g8zt6o-PriceSeparator e1un6ycg6">
      <div class="benefits">
        <div class="css-17hbhb5-FeatureList e1un6ycg7">
          <ul>
            <?php foreach($vipBenefits as $vipBenefit): ?>
              <li><i class="fas fa-check red"></i><span class="false false"> <?php echo $vipBenefit ?> </span></li>
            <?php endforeach; ?>
            <li><i class="fas fa-check red"></i><span class="false false"> Vip Duration: 7 Days</span></li>
            <li>&nbsp</li>
          </ul>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg.week">Buy now</button>
      </div>
    </div>
    <div class="css-1xqsvmv-ItemFooter e1un6ycg10"></div>
  </div>
  <div class="css-tpqd6g-ItemOuterContainer e1un6ycg2 col-lg-3">
    <div class="css-ww32ah-ItemTop e1un6ycg1"></div>
    <div class="css-vww6o0-ItemHeader e1un6ycg3">
      <h3>Vip For A Month</h3>
    </div>
    <div class="css-e2tnif-ItemBody e1un6ycg4">
      <div class="css-15dzmog-PriceContainer e1un6ycg5" height="139">
        <div class="price-text">
          <p>240.000 <sup>VNĐ</sup></p>
        </div>
      </div>
      <hr class="css-g8zt6o-PriceSeparator e1un6ycg6">
      <div class="benefits">
        <div class="css-17hbhb5-FeatureList e1un6ycg7">
          <ul>
          <?php foreach($vipBenefits as $vipBenefit): ?>
              <li><i class="fas fa-check red"></i><span class="false false"> <?php echo $vipBenefit ?> </span></li>
            <?php endforeach; ?>
            <li><i class="fas fa-check red"></i><span class="false false"> Vip Duration: 30 Days</span></li>
            <li>&nbsp</li>
          </ul>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg.month">Buy now</button>
      </div>
    </div>
    <div class="css-1xqsvmv-ItemFooter e1un6ycg10"></div>
  </div>
  <div class="css-tpqd6g-ItemOuterContainer e1un6ycg2 col-lg-3">
    <div class="css-ww32ah-ItemTop e1un6ycg1"></div>
    <div class="css-vww6o0-ItemHeader e1un6ycg3">
      <h3>Vip For A Year</h3>
    </div>
    <div class="css-e2tnif-ItemBody e1un6ycg4">
      <div class="css-15dzmog-PriceContainer e1un6ycg5" height="139">
        <div class="price-text">
          <p>2.920.000 <sup>VNĐ</sup></p>
        </div>
      </div>
      <hr class="css-g8zt6o-PriceSeparator e1un6ycg6">
      <div class="benefits">
        <div class="css-17hbhb5-FeatureList e1un6ycg7">
          <ul>
          <?php foreach($vipBenefits as $vipBenefit): ?>
              <li><i class="fas fa-check red"></i><span class="false false"> <?php echo $vipBenefit ?> </span></li>
            <?php endforeach; ?>
            <li><i class="fas fa-check red"></i><span class="false false"> Vip Duration: 365 Days</span></li>
            <li><i class="fas fa-check red"></i><span class="false false"> Gifts From The Event</span></li>
          </ul>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg.year">Buy now</button>
      </div>
    </div>
    <div class="css-1xqsvmv-ItemFooter e1un6ycg10"></div>
  </div>
</div>




<div class="modal fade bd-example-modal-lg week" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
    <div class="modal-content" style="text-align: center;">
      <h3>Transfer money information</h3>
      <h4>Techcombank</h4>
      Number account: 1235489674521
      <br>
      Branch: Phạm Hùng
      <br>
      Transfer content: vip {{Auth::user()->email}} week
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg month" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
    <div class="modal-content" style="text-align: center;">
      <h3>Transfer money information</h3>
      <h4>Techcombank</h4>
      Number account: 1235489674521
      <br>
      Branch: Phạm Hùng
      <br>
      Transfer content: vip {{Auth::user()->email}} month
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg year" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
    <div class="modal-content" style="text-align: center;">
      <h3>Transfer money information</h3>
      <h4>Techcombank</h4>
      Number account: 1235489674521
      <br>
      Branch: Phạm Hùng
      <br>
      Transfer content: vip {{Auth::user()->email}} year
    </div>
  </div>
</div>