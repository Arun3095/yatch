/*!
 * Custom Js v3.3.7 (http://vridhisoftech.com)
 * Copyright 2011-2020 Twitter, Inc.
 * Licensed under the MIT license By Arun Dhanwantri
 */

 


 /*All Slider's*/
  $(".packge-slide").slick({
          autoplay: true,
          autoplaySpeed: 3000,
          dots: false,
          arrows: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: !0,
          margin: 5,
          responsive: [{
            breakpoint: 1200,
            settings: {
              slidesToShow: 3
            }
          }, {
            breakpoint: 992,
            settings: {
              slidesToShow: 3
            }
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          }, {
            breakpoint: 670,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }]
         });
         
         $(".testimonial-box ,.what-people-main-box").slick({
          autoplay: true,
          autoplaySpeed: 3000,
          dots: true,
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: !0,
          margin: 5,
          responsive: [{
            breakpoint: 1200,
            settings: {
              slidesToShow: 1
            }
          }, {
            breakpoint: 992,
            settings: {
              slidesToShow: 1
            }
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }, {
            breakpoint: 670,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }]
         });
         
         $(".top-main-slider").slick({
          autoplay: true,
          autoplaySpeed: 3000,
          dots: true,
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: !0,
          margin: 0,
          responsive: [{
            breakpoint: 1200,
            settings: {
              slidesToShow: 1
            }
          }, {
            breakpoint: 992,
            settings: {
              slidesToShow: 1
            }
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }, {
            breakpoint: 670,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }]
         });