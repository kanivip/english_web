@extends('layouts.app')
<div class="details">
  <div id="background">
    <img src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=b38c22a46932485790a3f52c61fcbe5a" alt="John Doe" class="profile-pic">
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
    <div class="col-4">
      <h4>{{Auth::user()->vip}}</h4>
      <h4><i class="fas fa-gem"></i> Days </h4>
    </div>
    <div class="col-4">
      <h4>100</h4>
      <h4><i class="fas fa-book"></i> Leaned </h4>
    </div>
  </div>
</div>

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
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-free.svg"><span class="false dim">5 Coin For Daily Rewards</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-free.svg"><span class="false dim">Limit Of 3 Lessons/Day</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-free.svg"><span class="false dim">Normal Support Time</span></li>
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
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">7 Coin For Daily Rewards</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">No Limit Lessons/Day</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Fast Support Time</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Join The Monthly Leaderboard</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Vip Duration: 7 Days</span></li>
              <li>&nbsp</li>
            </ul>
          </div>
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
            <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">10 Coin For Daily Rewards</span></li>
            <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">No Limit Lessons/Day</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Fast Support Time</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Join The Monthly Leaderboard</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Vip Duration: 30 Days</span></li>
              <li>&nbsp</li>
            </ul>
          </div>
          <div class="css-13re8s3-ButtonContainer e1un6ycg8"><button class="button css-1831f4k" style="min-width: 230px;">Join</button></div>
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
            <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">10 Coin For Daily Rewards</span></li>
            <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">No Limit Lessons/Day</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Fast Support Time</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Join The Monthly Leaderboard</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Vip Duration: 365 Days</span></li>
              <li><img src="https://www.nvidia.com/content/dam/en-zz/Solutions/gfn/subscriptions/icon-check-premium.svg"><span class="false false">Gifts From The Event</span></li>
            </ul>
          </div>
          <div class="css-13re8s3-ButtonContainer e1un6ycg8"><button class="button css-1831f4k" style="min-width: 230px;">Join</button></div>
        </div>
      </div>
    <div class="css-1xqsvmv-ItemFooter e1un6ycg10"></div>
  </div>
</div>