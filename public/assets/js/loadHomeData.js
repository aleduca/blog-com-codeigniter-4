import {swipe} from '/assets/js/swipeBanner.js';

async function loadHomeData(){
  var bannerHome = document.querySelector('._bannerHome');
  // var recent = document.querySelector('._recent');
  // var categoryCulture = document.querySelector('._category_culture');
  // var categoryBusiness = document.querySelector('._category_business');
  // var categoryLifeStyle = document.querySelector('._category_lifestyle');

  // const responses = await Promise.all([
  //   await fetch('/banner/home', { method: 'get' }),
  //   await fetch('/trendings', { method: 'get' }),
  //   await fetch('/recent', { method: 'get' }),
  //   await fetch('/category/culture', { method: 'get' }),
  //   await fetch('/category/business', { method: 'get' }),
  //   await fetch('/category/lifestyle', { method: 'get' }),
  // ]);

  // const bannerHtml = await responses[0].text();
  // const trendingHtml = await responses[1].text();
  // const recentHtml = await responses[2].text();
  // const categoryCultureHtml = await responses[3].text();
  // const categoryBusinessHtml = await responses[4].text();
  // const categoryLifeStyleHtml = await responses[5].text();

  // bannerHome.innerHTML = bannerHtml;
  // recent.innerHTML = recentHtml;
  
  // var trending = document.querySelector('._trending');
  // trending.innerHTML = trendingHtml;

  // categoryCulture.innerHTML = categoryCultureHtml;
  // categoryBusiness.innerHTML = categoryBusinessHtml;
  // categoryLifeStyle.innerHTML = categoryLifeStyleHtml;

  // !! load banner home
  const dataBanner = await fetch('/banner/home',{method:'get'});
  const bannerHtml = await dataBanner.text();
  bannerHome.innerHTML = bannerHtml;

  swipe('.sliderFeaturedPosts');

  // // !! load recent
  // const datataRecent = await fetch('/recent',{method:'get'});
  // const recentHtml = await datataRecent.text();
  // recent.innerHTML = recentHtml;

  // // !! load trendings
  // var trending = document.querySelector('._trending');
  // const dataTrending = await fetch('/trendings',{method:'get'});
  // const trendingHtml = await dataTrending.text();
  // trending.innerHTML = trendingHtml;

  // // !! Category culture
  // const dataCategoryCulture = await fetch('/category/culture',{method:'get'});
  // const categoryCultureHtml = await dataCategoryCulture.text();
  // categoryCulture.innerHTML = categoryCultureHtml;
  
  // // !! Category business
  // const dataCategoryBusiness = await fetch('/category/business',{method:'get'});
  // const categoryBusinessHtml = await dataCategoryBusiness.text();
  // categoryBusiness.innerHTML = categoryBusinessHtml;
  
  // // !! Category lifestyle
  // const dataCategoryLifeStyle = await fetch('/category/lifestyle',{method:'get'});
  // const categoryLifeStyleHtml = await dataCategoryLifeStyle.text();
  // categoryLifeStyle.innerHTML = categoryLifeStyleHtml;

}

loadHomeData();