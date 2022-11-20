import {swipe} from '/assets/js/swipeBanner.js';

async function loadHomeData(){
  var bannerHome = document.querySelector('._bannerHome');
  var recent = document.querySelector('._recent');

  const responses = await Promise.all([
    await fetch('/banner/home', { method: 'get' }),
    await fetch('/trendings', { method: 'get' }),
    await fetch('/recent', { method: 'get' }),
  ]);

  const bannerHtml = await responses[0].text();
  const trendingHtml = await responses[1].text();
  const recentHtml = await responses[2].text();

  bannerHome.innerHTML = bannerHtml;
  recent.innerHTML = recentHtml;

  var trending = document.querySelector('._trending');
  trending.innerHTML = trendingHtml;

  // // !! load banner home
  // const dataBanner = await fetch('/banner/home',{method:'get'});
  // const bannerHtml = await dataBanner.text();
  // bannerHome.innerHTML = bannerHtml;

  // // !! load trendings
  // const dataTrending = await fetch('/trendings',{method:'get'});
  // const trendingHtml = await dataTrending.text();
  // trending.innerHTML = trendingHtml;

  swipe('.sliderFeaturedPosts');



}

loadHomeData();