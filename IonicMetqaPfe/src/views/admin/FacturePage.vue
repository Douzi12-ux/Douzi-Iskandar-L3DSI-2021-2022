<template>

  <ion-page  >
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons>
          <ion-back-button default-href="/"></ion-back-button>
         <ion-text><h3>Commandes</h3></ion-text>

    </ion-buttons>
      </ion-toolbar>
       
   
    </ion-header>
    
    <ion-content >
      <div class="content">
          <ion-card>
 <img class="rr" src="assets/logo.png" />

<ion-card-header>Nom de client: {{nomclient}}</ion-card-header>
        <ion-card-header>Email de client: {{emailclient}}</ion-card-header>
        <ion-card-header id="articles" v-html="'Les article : '+idarticle"></ion-card-header>
        
        <ion-card-header>Prix Totale :{{prixTotale}} Qar</ion-card-header>
<ion-button @click="createPDF ()">Imprimer</ion-button>
           </ion-card>
    </div>
    </ion-content>
    
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonPage,IonHeader, IonToolbar,IonCard,IonCardHeader
 ,IonButton,IonButtons,IonBackButton
  } from '@ionic/vue';
import { defineComponent } from 'vue';
import axios from 'axios' ;
import $ from 'jquery';
import {trash,create,add,swapVertical} from 'ionicons/icons';
import jsPDF from 'jspdf'

export default defineComponent({
  data() {
    return {
      commandes: [], 
          id:this.$route.params.id,
          nomclient:this.$route.params.nomclient,
          emailclient:this.$route.params.emailclient,
          idarticle:this.$route.params.idarticle,
          prixTotale:this.$route.params.prixTotale,
         url:"http://192.168.125.159:8000"
    }
    
  },methods:{
     createPDF () {

       
    let pdfName = this.nomclient+" facture"; 
    var niceimage = new Image();
    var doc = new jsPDF();
    console.log(this.idarticle.toString().replace("/QR/g", "df"))
;
   niceimage.src = 'assets/logo.png ';

 
   doc.addImage(niceimage, 'PNG', 30, 10, 150,0);
   
   doc.text('Nom du client : '+this.nomclient,20,100);
   doc.text('Email du client : '+this.emailclient,20,110);
   doc.text($('#articles').text(),20,120);
   doc.save(pdfName + '.pdf');
  }
    
  
  },
  created() {
    axios.get(this.url+'/api/commande')
      .then(res => this.commandes = res.data)
    
  },name: 'FacturesPage',
  components: {
    IonContent,
    IonHeader,
    IonPage,

    IonToolbar,
    IonButton
 ,IonButtons,IonBackButton
 ,IonCard,IonCardHeader
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

#g{margin-left: 35%;}
</style>
