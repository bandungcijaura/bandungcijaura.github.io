<?php
/*
 * ------------------------------------------------------------------------
 * Yt FrameWork for Joomla 3.0
 * ------------------------------------------------------------------------
 * Copyright (C) 2009 - 2012 The YouTech JSC. All Rights Reserved.
 * @license - GNU/GPL, http://www.gnu.org/licenses/gpl.html
 * Author: The YouTech JSC
 * Websites: http://www.smartaddons.com - http://www.cmsportal.net
 * ------------------------------------------------------------------------
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include class YtTemplate
include_once (__DIR__.'/includes/yt_template.class.php');
// Include file: frame_inc.php
include_once (__DIR__.'/includes/frame_inc.php');
// Check RTL or LTF direction
$dir = ($ytrtl == 'rtl') ? ' dir="rtl"' : '';
?>
<!DOCTYPE html>
<html<?php echo $dir; ?> lang="<?php echo $this->language; ?>">
<head>
  <jdoc:include type="head" />
  <?php
  $browser = new Browser();
  ?>
    <meta name="HandheldFriendly" content="true"/>
    <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />  
    <meta http-equiv="cleartype" content="on" />
    <?php if ($browser->getBrowser()== Browser::BROWSER_IPHONE ){?>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-touch-fullscreen" content="yes" />
    <?php }
  include_once (__DIR__.'/includes/head.php');
  ?>
  
</head>
  
<?php
  //
  $cls_body = '';
  //render a class for home page
  $cls_body .= $yt->isHomePage() ? 'homepage ' : '';
  //add a class for each component
  $cls_body .= (JRequest::getVar('option')!= null) ? JRequest::getVar('option') .' ' : '';
  //add a view class which helps you easy to style
  $cls_body .= (JRequest::getVar('view')!= null) ? 'view-' . JRequest::getVar('view') . ' ' : '';
  //for stype. With each style, we will use one class
  $cls_body .= $yt->getParam('sitestyle').' ';
  //for RTL direction
  $cls_body .= ($ytrtl == 'rtl') ? 'rtl' . ' ' : '';
  //add a class according to the template name
  $cls_body .= $yt->template. ' ';
  // class no-slideshow
  $cls_body .=  ($doc->countModules('slide_show'))?'':'no-slideshow ';
  // class ipadbrowser
  $cls_body .=  ($browser->getBrowser()== Browser::PLATFORM_IPAD )?' ipadbrowser':'';
?>
<body id="bd" class="<?php echo $cls_body; ?>" onLoad="prettyPrint()">   
  <jdoc:include type="modules" name="debug" />                                   
  <section id="yt_wrapper">  
    <a id="top" name="scroll-to-top"></a>
    <?php
    /*render blocks. for positions of blocks, please refer layouts folder. */
    foreach($yt_render->arr_TB as $tagBD) {
      //BEGIN Check if position not empty
      if( $tagBD["countModules"] > 0 ) {
        // BEGIN: Content Area
        if( ($tagBD["name"] == 'content') ) { 
          //class for content area
          $cls_content  = $tagBD['class_content'];
          $cls_content  .= ' block';
          echo "<{$tagBD['html5tag']} id=\"{$tagBD['id']}\" class=\"{$cls_content}\">";
          ?>
            <div class="yt-main">
              <div class="yt-main-in1 container">
                <div class="yt-main-in2 row">
                      <?php
                  $countL = $countR = $countM = 0;
                  // BEGIN: foreach position of block content
                  // IMPORTANT: Please do not edit this block
                  foreach($tagBD['positions'] as $position):
                    include(__DIR__.'/includes/block-content.php');
                  endforeach; 
                  // END: foreach position of block content
                  ?>
                </div>
              </div>
            </div>         
                    <?php   
          echo "</{$tagBD['html5tag']}>";
          ?>
          <?php
        // END: Content Area
         
        // BEGIN: For other blocks
        } elseif ($tagBD["name"] != 'content'){   
                    echo "<{$tagBD['html5tag']} id=\"{$tagBD['id']}\" class=\"block\">";
          ?>
            <div class="yt-main">
              <div class="yt-main-in1 container">
                <div class="yt-main-in2 row">
                <?php    
                if( !empty($tagBD["hasGroup"]) && $tagBD["hasGroup"] == "1"){
                  // BEGIN: For Group attribute
                  $flag = ''; 
                  $openG = 0; 
                  $c = 0;
                  foreach( $tagBD['positions'] as $posFG ):  
                    $c = $c + 1;
                    if( $posFG['group'] != "" && $posFG['group'] != $flag){ 
                      $flag = $posFG['group'];
                      if ($openG == 0) { 
                        $openG = 1;
                        $groupnormal = 'group-' . $flag.$tagBD['class_groupnormal'];
                        $group_style = isset($tagBD['width-' . $flag]) ? 'width:' . $tagBD['width-'.$flag]. '; ' : '' ;
                        $group_style .= $float1;
                        echo '<div class="' . $groupnormal . ' clearfix" style="' . $group_style . '">' ; 
                        echo $yt->renPositionsGroup($posFG);  
                        if($c == count( $tagBD['positions']) ) {
                          echo '</div>';
                        }
                      } else {
                        $openG = 0;
                        $groupnormal = 'group-' . $flag;
                        $group_style = $tagBD['width-'.$flag] ;
                      
                        echo '</div>';
                        echo '<div class="' . $groupnormal . ' clearfix" style="' . $group_style . ';' . $float1 . '">' ;                 
                        echo $yt->renPositionsGroup($posFG);
                      }
                    } elseif ($posFG['group'] != "" && $posFG['group'] == $flag){
                      echo $yt->renPositionsGroup($posFG);
                      if($c == count( $tagBD['positions']) ) {
                        echo '</div>';
                      }
                    }elseif($posFG['group']==""){ 
                      if($openG ==1){
                        $openG = 0;
                        echo '</div>';
                      }
                      echo $yt->renPositionsGroup($posFG);
                    }
                  endforeach;
                  // END: For Group attribute
                }else{ 
                  // BEGIN: for Tags without group attribute
                  if(isset($tagBD['positions'])){ 
                    echo $yt->renPositionsNormal($tagBD['positions'], $tagBD["countModules"]);
                  }
                  // END: for Tags without group attribute
                }
                ?>
                </div>
              </div>
            </div>
                    <?php
          echo "</{$tagBD['html5tag']}>";
          ?>
      <?php
         }
         // END: For other blocks
      }
      // END Check if position not empty
    }
    //END: For
    ?>
    
    <?php
    include_once (__DIR__.'/includes/bottom.php');
    ?>
        
  </section>
</body>
<div style="display: none;"><a href="https://gunung388.net/">gunung388</a><a href="https://heylink.me/gunung388gacor">gunung388</a><a href="https://www.gunung388resmi.site/">gunung388</a><a href="https://nncg.org/gacor/">scatter hitam</a><a href="https://www.acs-linksystems.com/gacor/">slot viral</a><a href="https://tuppertreefarm.com/">idncash slot online</a><a href="https://idntogel.app/">idntogel slot maxwin</a><a href="https://ulatbuluraksasa.github.io/kepompong/kemenangan-maksimal-di-gates-of-gatot-kaca-x1000-pola-resmi.html">kemenangan maksimal di gates of gatot kaca x1000 pola resmi</a><a href="https://ulatbuluraksasa.github.io/kepompong/merger-xl-dan-smart-jadi-xlsmart-jackpot-besar-mahjong-wins-3.html">merger xl dan smart jadi xlsmart jackpot besar mahjong wins 3</a><a href="https://ulatbuluraksasa.github.io/kepompong/perbandingan-poco-f6-vs-samsung-a55-cari-cuan-di-mahjong-ways-2.html">perbandingan poco f6 vs samsung a55 cari cuan di mahjong ways 2</a><a href="https://ulatbuluraksasa.github.io/kepompong/ponsel-tangguh-flagship-vivo-x200-lebih-murah.html">ponsel tangguh flagship vivo x200 lebih murah</a><a href="https://ulatbuluraksasa.github.io/kepompong/rahasia-jackpot-berlimpah-dari-para-suhu-mahjong-wins-3.html">rahasia jackpot berlimpah dari para suhu mahjong wins 3</a><a href="https://ulatbuluraksasa.github.io/kepompong/event-tahun-baru-imlek-total-kemenangan-di-gandakan-pada-mahjong-wins-3.html">event tahun baru imlek total kemenangan di gandakan pada mahjong wins 3</a><a href="https://ulatbuluraksasa.github.io/kepompong/mantan-admin-ini-di-pecat-karena-bagikan-pola-dan-bocoran-jackpot.html">mantan admin ini di pecat karena bagikan pola dan bocoran jackpot</a><a href="https://ulatbuluraksasa.github.io/kepompong/menguak-misteri-4-simbol-naga-hitam-di-mahjong-wins-3.html">menguak misteri 4 simbol naga hitam di mahjong wins 3</a><a href="https://ulatbuluraksasa.github.io/kepompong/permainan-bertema-klasik-mahjong-wins-3-vs-mahjong-ways-2.html">permainan bertema klasik mahjong wins 3 vs mahjong ways 2</a><a href="https://ulatbuluraksasa.github.io/kepompong/pola-dan-trik-rahasia-mahjong-ways-2-sukses-cuan-besar.html">pola dan trik rahasia mahjong ways 2 sukses cuan besar</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/elon-musk-kembali-guncang-pasar-kripto.html">elon musk kembali guncang pasar kripto</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/adu-ketahanan-samsung-galaxy-a16-5g-di-mahjong-ways-2.html">adu ketahanan samsung galaxy a16 5g di mahjong ways 2</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/beli-toyota-innova-zenix-dari-jackpot-besar-sugar-rush-x1000.html">beli toyota innova zenix dari jackpot besar sugar rush x1000</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/kunci-sukses-cuan-besar-tekun-dan-belajar-pola-rahasia-sweet-bonanza-x1000.html">kunci sukses cuan besar tekun dan belajar pola rahasia sweet bonanza x1000</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/menang-besar-mahjong-wins-3-dengan-bocoran-teknik-spin-turbo.html">menang besar mahjong wins 3 dengan bocoran teknik spin turbo</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/nikah-ke-3-kali-setelah-hoki-jackpot-besar-olympus-x1000.html">nikah ke 3 kali setelah hoki jackpot besar olympus x1000</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/penghasil-profit-big-bass-bonanza-jadi-alternatif-mania-mancing.html">penghasil profit big bass bonanza jadi alternatif mania mancing</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/pi-network-siapkan-peluncuran-mainnet-event-jackpot-ganda-di-lucky-neko.html">pi network siapkan peluncuran mainnet event jackpot ganda di lucky neko</a><a href="https://jurnal.uindatokarama.ac.id/public/journals/files/solana-dan-ethereum-di-prediksi-melesat-wild-bandito-alternatif-profit-besar.html">solana dan ethereum di prediksi melesat wild bandito alternatif profit besar</a></div>
<div style="display: none;"><a href="https://akuntansi.unisla.ac.id/">Prodi Akuntansi Univesitas Islam Lamongan</a><a href="https://wonderworldwaterparkandresort.com/">Wonderworldwaterpark</a><a href="https://cbi.azc.uam.mx/">Universidad Autonoma Metropolitana Azcapotzalco</a><a href="https://generoytransgresion.azc.uam.mx/">Genero y reconfiguracion social</a><a href="https://sociologia.azc.uam.mx/">Departamento de SociologÃ­a</a><a href="https://ceu.azc.uam.mx/">UAM Azcapotzalco | CoordinaciÃ³n de ExtensiÃ³n Universitaria</a><a href="https://tiempouam.azc.uam.mx/">TIEMPO UAM</a><a href="https://coloquiovisualizacion.azc.uam.mx/">Coloquio Internacional VisualizaciÃ³n</a><a href="https://pkmtgselor.bulungan.go.id/">UPT Puskesmas Tanjung Selor</a><a href="https://kaisiadoriuzinios.lt/">Kaisiadoriu zinios informacinis portalas</a><a href="https://argus.com.bo/">INICIO</a><a href="https://senturia.com.vn/senturia-vuon-lai/">Senturia Vuon Lai</a><a href="https://roqueleonelrodriguez.roqueleonelrodriguez.com/">Fundacion RLR</a><a href="https://roqueleonelrodriguez.org/">Fundacion RLR</a><a href="https://palomeneskc.lt/">Terkini Berita Indo</a><a href="https://tienphuoc.com/">Tien Phuoc</a><a href="https://centrosocial.paroquiadaajuda.org/">Centro Social da Paroquia</a><a href="https://kaisiadoriuzinios.lt/">Kaisiadoriu zinios informacinis portalas</a><a href="https://guia-construccion.com/">Guia de la Construccion</a><a href="https://techstartnews.com/">techstartnews</a><a href="https://rasindogroup.com">Ras Indo Group</a><a href="https://www.friwebteknologi.org">Friweb Teknologi</a><a href="https://www.ambamalicanada.org">Ambamali Canada</a><a href="https://openetherpad.com/">Open Ether Pad</a><a href="https://myoregonfarmgarden.com/">Oregon Farm Garden News</a><a href="https://aimtoronto.org/">Aim Toronto</a><a href="https://thepoisonedpawn.com/">The Poisoned Pawn</a><a href="https://www.resistancemanual.org/">Resistance Manual</a><a href="https://shiotogel4d.org/">Prediksi shiotogel4d</a><a href="https://www.asalas.org/">Asalas Unlock Anime</a><a href="https://www.finasteriden.com/">Finasteriden</a><a href="https://www.marianswoman.org/">Marians Woman</a><a href="https://www.arheon.org/">Arheon</a><a href="https://www.mpaper.org/">MPAPER</a><a href="https://www.mvagustaoftampa.com/">MV Agusta of Tampa</a><a href="https://www.cheapshoesoutletonlines.com/">cheapshoesoutletonlines</a><a href="https://www.rebeccasommer.org/">RebeccaSommer</a><a href="https://www.vandelayarmor.com/">Vandelay Armor</a><a href="https://www.grfxgamingpartybus.com/">GRFX Gaming Party</a><a href="https://www.houseofbeautysalons.com/">House of Beauty</a><a href="https://www.learnmistake.com/">Learn Mistake</a></div>
</html>
