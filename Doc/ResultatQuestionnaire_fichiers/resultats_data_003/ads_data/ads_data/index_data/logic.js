
// Reference to the creative's various properties and elements.
var creative = {};

function fetchData() {
  Enabler.setProfileId(10029222);
  var devDynamicContent = {};

  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1= [{}];
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0]._id = 0;
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Unique_ID = 1;
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Reporting_Label = "Expedia_728x90";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Exit_URL = "";

  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_0_copy_text = 'EXPERIENCE LONDON';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_0_copy_font_size = '24';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_1_copy_text = 'Book your flight';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_1_copy_font_size = '24';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_2_copy_text = 'your hotel';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_2_copy_font_size = '24';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_3_copy_text = 'and your activity';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_3_copy_font_size = '24';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_4_copy_text = 'all in one place';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_4_copy_font_size = '24';

  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_5_copy_A_text = 'everything';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_5_copy_A_font_size = '40';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_5_copy_B_text = 'you need to go';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_5_copy_B_font_size = '30';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_5_copy_C_text = '';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Frame_5_copy_C_font_size = '30';

  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].EndFrame_cta = 'Build your trip';
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].EndFrame_cta_font_size = '18';

  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].EndFrameLogoAsset = {};
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].EndFrameLogoAsset.Type = "file";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].EndFrameLogoAsset.Url = "https://s0.2mdn.net/ads/richmedia/studio/11561/11561_20180129043722653_findYourBritain.jpg";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image1Asset = {};
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image1Asset.Type = "file";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image1Asset.Url = "https://s0.2mdn.net/ads/richmedia/studio/11561/11561_20180129043736339_image1.jpg";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image2Asset = {};
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image2Asset.Type = "file";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image2Asset.Url = "https://s0.2mdn.net/ads/richmedia/studio/11561/11561_20180129043748142_image2.jpg";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image3Asset = {};
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image3Asset.Type = "file";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image3Asset.Url = "https://s0.2mdn.net/ads/richmedia/studio/11561/11561_20180129043802345_image3.jpg";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image4Asset = {};
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image4Asset.Type = "file";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].Image4Asset.Url = "https://s0.2mdn.net/ads/richmedia/studio/11561/11561_20180129043814764_image4.jpg";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].LogoEndAsset = {};
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].LogoEndAsset.Type = "file";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].LogoEndAsset.Url = "https://s0.2mdn.net/ads/richmedia/studio/11561/11561_20180129043827264_logoEnd.png";
  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].isActive = true;

  devDynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0].disableIcons = false;

  Enabler.setDevDynamicContent(devDynamicContent);
}


var dynamicDataHandler = function(){
  this.content = {};
};

dynamicDataHandler.prototype = {
  setData: function(content) {
    this.content = content;
  },
  getData: function(field) {
    return this.content[field] || null;
  }
};

function formatCopy(copy) {
  var copyToFormat = copy || '';
  return copyToFormat.replace(/(<n>)/g, '<br/>');
}

var data = new dynamicDataHandler();

fetchData();

/**
 * Called on the window load event.
 */
function preInit() {
  setupDom();

  if (Enabler.isInitialized()) {
    init();
  } else {
    Enabler.addEventListener(
      studio.events.StudioEvent.INIT,
      init
    );
  }
}

function switchIcons(action) {
  if (action) {
    var icons = document.querySelectorAll('[data-icon]');
    icons.forEach(function(icon) {
      icon.style.display = 'none';
    });
  }
}

/**
 * Set up references to DOM elements.
 */
function setupDom() {
  creative.dom = {};
  creative.dom.preloader = document.getElementById('preloader');
  creative.dom.mainContainer = document.getElementById('main-container');
  creative.dom.exit = document.getElementById('exit');
  creative.dom.logoSplashBg = document.getElementById('logoSplashBg');
  creative.dom.logoCircle = document.getElementById('logoCircle');
  creative.dom.logoPlane = document.getElementById('logoPlane');
  creative.dom.imgMask = document.getElementById('imgMask');
  creative.dom.img1 = document.getElementById('img1');
  creative.dom.img2 = document.getElementById('img2');
  creative.dom.img3 = document.getElementById('img3');
  creative.dom.img4 = document.getElementById('img4');
  creative.dom.frame0Copy = document.getElementById('frame0Copy');
  creative.dom.frame1Copy = document.getElementById('frame1Copy');
  creative.dom.frame2Copy = document.getElementById('frame2Copy');
  creative.dom.frame3Copy = document.getElementById('frame3Copy');
  creative.dom.frame4Copy = document.getElementById('frame4Copy');
  creative.dom.frame5CopyA = document.getElementById('frame5CopyA');
  creative.dom.frame5CopyB = document.getElementById('frame5CopyB');
  creative.dom.frame5CopyC = document.getElementById('frame5CopyC');
  creative.dom.frame1Icon = document.getElementById('frame1Icon');
  creative.dom.frame2Icon = document.getElementById('frame2Icon');
  creative.dom.frame3Icon = document.getElementById('frame3Icon');
  creative.dom.orangePanel = document.getElementById('orangePanel'); 
  creative.dom.endFrame = document.getElementById('endFrame'); 
  creative.dom.endBadge = document.getElementById('endBadge');
  creative.dom.cta = document.getElementById('cta');
  creative.dom.logoEnd = document.getElementById('logoEnd');
  creative.dom.badgeImg = document.getElementById('badgeImg');
  creative.dom.barImageContainer = document.getElementById('barImageContainer');
}

function setupElement(element, text, fontSize) {
  element.innerHTML = formatCopy(text);
  if (fontSize && fontSize.length) {
    element.style.fontSize = fontSize + 'px';
  }
}

function setupCopyTexts() {
  setupElement(creative.dom.frame0Copy, data.getData('Frame_0_copy_text'), data.getData('Frame_0_copy_font_size'));
  setupElement(creative.dom.frame1Copy, data.getData('Frame_1_copy_text'), data.getData('Frame_1_copy_font_size'));
  setupElement(creative.dom.frame2Copy, data.getData('Frame_2_copy_text'), data.getData('Frame_2_copy_font_size'));
  setupElement(creative.dom.frame3Copy, data.getData('Frame_3_copy_text'), data.getData('Frame_3_copy_font_size'));
  setupElement(creative.dom.frame4Copy, data.getData('Frame_4_copy_text'), data.getData('Frame_4_copy_font_size'));

  setupElement(creative.dom.frame5CopyA, data.getData('Frame_5_copy_A_text'), data.getData('Frame_5_copy_A_font_size'));
  setupElement(creative.dom.frame5CopyB, data.getData('Frame_5_copy_B_text'), data.getData('Frame_5_copy_B_font_size'));
  setupElement(creative.dom.frame5CopyC, data.getData('Frame_5_copy_C_text'), data.getData('Frame_5_copy_C_font_size'));

  setupElement(creative.dom.cta, data.getData('EndFrame_cta'), data.getData('EndFrame_cta_font_size'));
}

function setElementBackgroundImage(element, url) {
  element.style.backgroundImage = "url('" + url +"')";
}

function setupImages() {
  setElementBackgroundImage(creative.dom.img1, data.getData('Image1Asset').Url);
  setElementBackgroundImage(creative.dom.img2, data.getData('Image2Asset').Url);
  setElementBackgroundImage(creative.dom.img3, data.getData('Image3Asset').Url);
  setElementBackgroundImage(creative.dom.img4, data.getData('Image4Asset').Url);
  setElementBackgroundImage(creative.dom.logoEnd, data.getData('LogoEndAsset').Url);
  setElementBackgroundImage(creative.dom.badgeImg, data.getData('EndFrameLogoAsset').Url);
  setElementBackgroundImage(creative.dom.barImageContainer, data.getData('LogoEndAsset').Url);
}

/**
 * The Enabler is now initialized and any extra modules have been loaded.
 */
function init() {
  data.setData(dynamicContent.Expedia_Dynamic_Toolkit_FR_Sheet1[0]);
  setupCopyTexts();
  setupImages();
  switchIcons(data.getData('disableIcons'));

  addListeners();

  var assetUrls = [
    data.getData('Image1Asset').Url,
    data.getData('Image2Asset').Url,
    data.getData('Image3Asset').Url,
    data.getData('Image4Asset').Url,
    data.getData('LogoEndAsset').Url,
    data.getData('EndFrameLogoAsset').Url
  ];
  // Polite loading
  if (Enabler.isVisible()) {
    loadImages(assetUrls);
  }
  else {
    Enabler.addEventListener(studio.events.StudioEvent.VISIBLE, function() { loadImages(assetUrls); });
  }
}

/**
 * Add appropriate listeners after the creative's DOM has been set up.
 */
function addListeners() {
  creative.dom.exit.addEventListener('click', exitClickHandler);
}

/**
 *  Shows the ad.
 */
function show() {
  creative.dom.exit.style.display = "block";
  TweenLite.to(preloader, 0.5, {alpha:0});
  TweenLite.set(preloader, {display:"none", delay: 0.5});

  playTimeline();
}

function loadImages(urls) {
  if (!urls.length) {
    show();
    return;
  }

  var image = new Image();

  image.onload = function(){
    loadImages(urls.slice(1, urls.length));
  };
  image.src = urls[0];
}

// ---------------------------------------------------------------------------------
// MAIN
// ---------------------------------------------------------------------------------

function playTimeline() {

  tl = new TimelineMax({paused:false});
  // tl = new TimelineMax({repeat:-1});

    tl.add('intro')
          .set(creative.dom.barImageContainer, {opacity: 0})
          .from(creative.dom.logoPlane, 0.5, {x:-140,y:40, ease:Back.easeOut}, 'intro')

    .add('frame0', '+=1')
          .to(creative.dom.barImageContainer, 0.25, {opacity: 1}, 'frame0+=0.25')
          .to(creative.dom.img1, 0.5, {autoAlpha:1, ease:Power2.easeInOut}, 'frame0')
          .to(creative.dom.logoCircle, 0.5, {autoAlpha:0, ease:Power2.easeInOut}, 'frame0+=0.2')
          .to(creative.dom.imgMask, 0.5, {scale:10, ease:Power2.easeInOut}, 'frame0+=0.2')
          .to(creative.dom.logoCircle, 0.5, {autoAlpha:0, ease:Power2.easeInOut}, 'frame0+=0.2')
          .from(creative.dom.frame0Copy, 0.35, {y:100, autoAlpha:0, ease:Power2.easeInOut}, 'frame0+=0.2')
          .to(creative.dom.logoPlane, 0.5, {x:270,y:-70,autoAlpha:0, ease:Power2.easeInOut}, 'frame0')

    .add('frame1', '+=1')
          .to(creative.dom.frame0Copy, 0.25, {y:-100, autoAlpha:0, ease:Power2.easeInOut}, 'frame1')
          .from(creative.dom.frame1Copy, 0.35, {y:100, autoAlpha:0, ease:Power2.easeInOut}, 'frame1+=0.2')
          .from(creative.dom.frame1Icon, 0.35, {backgroundPosition: "0 70px", autoAlpha:0, ease:Power2.easeInOut}, 'frame1')

      .add('frame2', '+=1.5')
          .from(creative.dom.img2, 0.35, {y: 90}, 'frame2')
          .set(creative.dom.img2, {autoAlpha:1}, 'frame2')
          .from(creative.dom.frame2Copy, 0.35, {y:100, autoAlpha:0, ease:Power2.easeInOut}, 'frame2+=0.5')
          .from(creative.dom.frame2Icon, 0.35, {backgroundPosition: "0 70px", autoAlpha:0, ease:Power2.easeInOut}, 'frame2+=0.5')

      .add('frame3', '+=1.5')
          .from(creative.dom.img3, 0.35, {y: 90}, 'frame3')
          .set(creative.dom.img3, {autoAlpha:1}, 'frame3')
          .from(creative.dom.frame3Copy, 0.35, {y:100, autoAlpha:0, ease:Power2.easeInOut}, 'frame3+=0.5')
          .from(creative.dom.frame3Icon, 0.35, {backgroundPosition: "0 70px", autoAlpha:0, ease:Power2.easeInOut}, 'frame3+=0.5')

      .add('frame4', '+=1.5')
          .from(creative.dom.img4, 0.35, {y: 90}, 'frame4')
          .set(creative.dom.img4, {autoAlpha:1}, 'frame4')
          .from(creative.dom.frame4Copy, 0.35, {y:100, autoAlpha:0, ease:Power2.easeInOut}, 'frame4+=0.5')

      .add('frame5', '+=1.5')
          .to(creative.dom.frame4Copy, 0.25, {y:-100, autoAlpha:0, ease:Power2.easeInOut}, 'frame5')
          .from(creative.dom.frame5CopyA, 0.35, {y:50, autoAlpha:0, ease:Power2.easeInOut}, 'frame5')
          .from(creative.dom.frame5CopyB, 0.35, {y:-50, autoAlpha:0, ease:Back.easeOut}, 'frame5+=0.5')
          .from(creative.dom.frame5CopyC, 0.35, {y:-50, autoAlpha:0, ease:Back.easeOut}, 'frame5+=1')

      .add('end+=1.5')
          .to(creative.dom.barImageContainer, 0.25, {opacity: 0}, 'end')
          .to(creative.dom.orangePanel, 0.25, {opacity: 1}, 'end')
          .to(creative.dom.endFrame, 0.75, {y:-90}, 'end+=0.5')
}

function exitClickHandler() {
  Enabler.exitOverride('BackgroundExit', data.getData('Exit_URL').Url);
}

/**
 *  Main onload handler
 */
window.addEventListener('load', preInit);