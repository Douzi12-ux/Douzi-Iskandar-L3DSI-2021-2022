<template>
  <ion-page>
    <menu-page></menu-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
         <ion-buttons slot="start" content-id="main">
              <ion-menu-button></ion-menu-button>
              <ion-label>Home</ion-label>
            </ion-buttons>
         
   
      </ion-toolbar>
       <img class="rr" src="assets/logo.png" />
    </ion-header>
    
    <ion-content :fullscreen="true" class="kk" id="main">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Blank</ion-title>
        </ion-toolbar>
      </ion-header>
    <img src="assets/16.jpg" />
    <ion-grid>
  <ion-row>
    <ion-col>
      <div><img class="circular" src="assets/15.jpg" /></div>
    </ion-col>
    <ion-col>
      <div><img class="circular" src="assets/17.jpg" /></div>
    </ion-col>
    <ion-col>
      <div><img class="circular" src="assets/13.jpg" /></div>
    </ion-col>
  </ion-row>
  <ion-row>
    <ion-col>
      <div><img class="circular" src="assets/14.jpg" /></div>
    </ion-col>
    <ion-col>
      <div><img class="circular" src="assets/12.jpg" /></div>
    </ion-col>
    <ion-col>
      <div><img class="circular" src="assets/11.jpg" /></div>
    </ion-col>
  </ion-row>
  <ion-row>
    <ion-col>
      <div><ion-card>
        <ion-card-header><img src="assets/1.jpg" /></ion-card-header>
        <ion-card-title>Eqpts & Accessories</ion-card-title>
        <ion-card-content>
Pilot Equipment
Aviation Helmets–Oxygen masks–Life Jackets–Life Rafts–Pilots Night Vision–Heads-up–Survival equipment–Night vision–Tools-Packs–Uniforms–Armor</ion-card-content>
      </ion-card></div>
    </ion-col>
    <ion-col>
      <div><ion-card>
        <ion-card-header><img src="assets/2.jpg" /></ion-card-header>
         <ion-card-title>Avionics & Instruments</ion-card-title>
        <ion-card-content>

We are capable to provide you with the best solution for your different equipment and systems as well as Communications Navigation – Monitoring – </ion-card-content>
        </ion-card></div>
    </ion-col>
    <ion-col>
      <div><ion-card>
        <ion-card-header><img src="assets/3.jpg" /></ion-card-header>
        <ion-card-title>Safety, Service and Reliability</ion-card-title>
        <ion-card-content>

Our Partners are available for all of your avionics needs from repair to complete cockpit upgrades & retrofits. We are experienced and trained to fulfill your cabin system requirements, including moving-map displays, cockpit cameras, DVD, CD, MP3 and iPod players,.. New technology.!</ion-card-content>
      </ion-card></div>
    </ion-col>
  </ion-row>
</ion-grid>
    <ion-button >Download Company File</ion-button>
            
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.20609888604!2d51.50553831484679!3d25.26365148386528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45db06711564b9%3A0x7c26d1735bcd545c!2sMilipol%20Equipment%20Trading%20%26%20Services%20(METQA)!5e0!3m2!1sen!2sqa!4v1652685514665!5m2!1sen!2sqa" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
  
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar,IonMenuButton,IonGrid,IonRow,IonCol,IonCard ,IonButton,IonButtons} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { menu } from 'ionicons/icons';
import MenuPage from './MenuPage.vue';
addIcons(
    { 
       "menu":menu
    }
    )

export default defineComponent({
  name: 'HomePage',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonCard,
    IonToolbar,
    IonGrid,
    IonRow,
    IonCol,
    IonButton,
    IonMenuButton,
    IonButtons,
    MenuPage
},
  methods:{
    
  }
});
</script>

<style scoped>
#container {
  text-align: center;
  
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}

#container strong {
  font-size: 20px;
  line-height: 26px;
}

#container p {
  font-size: 16px;
  line-height: 22px;
  
  color: #8c8c8c;
  
  margin: 0;
}

#container a {
  text-decoration: none;
}
.circular {
     height: 100px; 
     width: 100px; 
    border: 1px solid #fff;
    border-radius: 50%;
    box-shadow: 0 0 5px gray;
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
} 
.hh{height:100px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}

.kk{background-color: red;}

</style>
