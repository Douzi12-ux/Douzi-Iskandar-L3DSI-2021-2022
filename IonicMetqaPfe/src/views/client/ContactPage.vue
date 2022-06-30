<template>
  <ion-page>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/clienthome"></ion-back-button>
         <ion-text><h3>Contacter-Nous</h3></ion-text>

    </ion-buttons>
      </ion-toolbar>
       <img class="rr" src="assets/logo.png" />
 
    </ion-header>
    
    <ion-content>
      
      <div class="content">
          <ion-card>
              <img class="rr" src="assets/info_icon-3.png" />
              <ion-card-title style="text-align:center">info@metqa.com</ion-card-title>
              <ion-card-title style="text-align:center">admin@metqa.com</ion-card-title>
              <ion-card-title style="text-align:center">+974 44315335</ion-card-title>
          </ion-card>
         
          <ion-card>
              <img class="rr" src="assets/info_icon-1.png" />
              <ion-card-title style="text-align:center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.20609888604!2d51.50553831484679!3d25.26365148386528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45db06711564b9%3A0x7c26d1735bcd545c!2sMilipol%20Equipment%20Trading%20%26%20Services%20(METQA)!5e0!3m2!1sen!2sqa!4v1652685514665!5m2!1sen!2sqa" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>PO BOx 45731, New Slata, Doha, Qatar</ion-card-title>
          </ion-card>
    </div>
    </ion-content>
    
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonCard
,IonButtons,IonBackButton
  } from '@ionic/vue';
import { defineComponent } from 'vue';

import {trash,create,add,swapVertical} from 'ionicons/icons';
export default defineComponent({
  
    
  name: 'ContactPage',
  components: {
    IonContent,
    IonHeader,
    IonPage,
   
    IonToolbar,
    
IonButtons,IonBackButton
 ,IonCard
  },setup(){
    
  

    return {trash,create,add,swapVertical};
   
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

.a {
  margin-left: 20%;
  background-color: blue;
}
.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
.co{background-color: rgb(253, 253, 173);}
</style>
