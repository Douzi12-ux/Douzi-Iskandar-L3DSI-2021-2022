<template>
  <ion-page>
    <admin-menu></admin-menu>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
       <ion-buttons slot="start">
              <ion-menu-button></ion-menu-button>
            </ion-buttons>
     <ion-text><h3>Accueil</h3></ion-text>
        <ion-button color="dark" slot="end" @click="handleButtonClick()"><ion-icon  name="person" ></ion-icon></ion-button> 
      </ion-toolbar>
      <img class="rr" src="assets/logo.png" />
    </ion-header>
    
    <ion-content :fullscreen="true" id="main">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Blank</ion-title>
        </ion-toolbar>
      </ion-header>
      <div class="content">
     <ion-grid>
  <ion-row >
    <ion-col>
      <div><ion-card  color="danger">
        <ion-card-title style="text-align:center">{{a}}</ion-card-title>
        <ion-text style="text-align:center"><h4 >Totale Users</h4></ion-text>
        <ion-card-content><a href="/users" style="text-decoration:none;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    <ion-col>
      <div><ion-card  color="dark">
        <ion-card-title style="text-align:center">{{b}}</ion-card-title>
        <ion-text style="text-align:center"><h4>Totale Clients</h4></ion-text>
        <ion-card-content><a href="" style="text-decoration:none;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    
  </ion-row>
  <ion-row  >
    <ion-col >
      <div><ion-card  color="warning">
        <ion-card-title style="text-align:center">{{c}}</ion-card-title>
        <ion-card-title style="text-align:center">Commande Confirmer</ion-card-title>
        <ion-card-content><a href="" style="text-decoration:none;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    <ion-col>
      <div ><ion-card  color="success">
        <ion-card-title style="text-align:center">{{d}}</ion-card-title>
        <ion-text style="text-align:center"><h4>Fichier Archiver</h4></ion-text>
        <ion-card-content><a href="/archives" style="text-decoration:none;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    
  </ion-row>

</ion-grid>
  </div>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar,IonGrid,IonRow,IonCol,IonCard,IonCardContent,IonCardTitle,IonButton,actionSheetController} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { menu,person,home,mail,shirt } from 'ionicons/icons';
import axios from 'axios';

import AdminMenu from './AdminMenu.vue';
addIcons(
    { 
       "menu":menu,"person":person,"mail":mail,"shirt":shirt
    }
    )

export default defineComponent({
  name: 'AdminHome',
  data() {
    return {
      h:localStorage.getItem('name'),
      users:[],
      a: "",
      b: "",
      c: "",
      d: "",
      url:"http://192.168.125.159:8000"
    }
  },
  created(){
    axios.get(this.url+'/api/countusers')
      .then(res => this.a = res.data)
      axios.get(this.url+'/api/countClient')
      .then(res => this.b = res.data)
      axios.get(this.url+'/api/countCommande')
      .then(res => this.c = res.data)
      axios.get(this.url+'/api/countFichier')
      .then(res => this.d = res.data)
      axios.get(this.url+'/api/user')
      .then(res => this.users = res.data)
  },
  methods: {
   async handleButtonClick() {
        const actionSheet = await actionSheetController.create({
          header: 'Information De Connection :',

          buttons: [
            { text: 'Nom : '+localStorage.getItem('name'), icon: 'person'},
            { text: 'Email : '+localStorage.getItem('email'), icon: 'mail'},
            { text: 'Role : Administrateur', icon: 'shirt'},
            { text: 'Departement : Administration', icon: 'home'},
            { text: 'Cancel', role: 'cancel' },
          ],
        });

        await actionSheet.present();
      },
  },
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonTitle,
    IonToolbar,
    IonButton,
    
    IonGrid,
    IonRow,
    IonCol,
    IonCard,
    IonCardContent,
    IonCardTitle,
    AdminMenu
},setup(){
    
  

    return {home,mail,shirt,person};
   
  },
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
.hh{height:100px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}


</style>
