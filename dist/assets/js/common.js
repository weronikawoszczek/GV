"use strict";function checkScroll(){20<$(window).scrollTop()?$(".header-scroll").hasClass("scrolled")||$(".header-scroll").addClass("scrolled"):$(".header-scroll").hasClass("scrolled")&&$(".header-scroll").removeClass("scrolled")}app.common={mainInit:function(){$(".nav-icon1").click(function(e){e.preventDefault(),e.stopPropagation(),$(this).toggleClass("open"),$(".topMenu").toggleClass("opened"),$(".carousel-el, .slick-dots, .form-wrapper").toggleClass("hidden"),$(document).on("click",function e(){$(".topMenu").hasClass("opened")?($(".topMenu").removeClass("opened"),$(".menuToggle").removeClass("open"),$(".carousel-el, .slick-dots, .form-wrapper").toggleClass("hidden")):$(document).on("click",e)})}),$(".topMenu ul li a").each(function(){this.href==window.location.href&&$(this).toggleClass("checked")}),$(".header .headerMenu a").each(function(){this.href==window.location.href&&$(this).toggleClass("checked")}),$(".nav-el").on("click",function(e){$(".nav-el").removeClass("active"),$(this).addClass("active")}),$(".text-carousel").slick({slidesToShow:1,slidesToScroll:1,infinite:!0,autoplay:!0,autoplaySpeed:4e3,arrows:!0,dots:!0})}},$(function(){$(document).ready(function(){app.common.mainInit()})}),$(window).on("scroll",function(){checkScroll()});