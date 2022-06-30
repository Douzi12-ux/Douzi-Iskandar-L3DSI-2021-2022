<template>
  <ion-page>
    <ingenieur-menu></ingenieur-menu>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
       <ion-buttons slot="start">
              <ion-menu-button></ion-menu-button>
            </ion-buttons>
     <ion-text><h3>Ingenieur Accueil</h3></ion-text>
        <ion-button color="dark" slot="end" @click="handleButtonClick()"><ion-icon  name="person" ></ion-icon></ion-button> 
      </ion-toolbar>
       <img class="rr" src="assets/logo.png" />
    </ion-header>
    
    <ion-content :fullscreen="true" id="mainingenieur">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Blank</ion-title>
        </ion-toolbar>
      </ion-header>
    
      <div id="container">
       <ion-grid>
  <ion-row >
    <ion-col>
      <div><ion-card  color="danger">
        <ion-card-title style="text-align:center">4</ion-card-title>
        <ion-text style="text-align:center"><h4 >Totale Reclamations</h4></ion-text>
        <ion-card-content><a href="/users" style="text-decoration:none;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    <ion-col>
      <div><ion-card  color="dark">
        <ion-card-title style="text-align:center">1</ion-card-title>
        <ion-text style="text-align:center"><h4>Reclamation Confirmer</h4></ion-text>
        <ion-card-content><a href="" style="text-decoration:none;height: ;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    
  </ion-row>
  <ion-row  >
    <ion-col >
      <div><ion-card  color="warning">
        <ion-card-title style="text-align:center">2</ion-card-title>
        <ion-card-title style="text-align:center">Reclamation En Cours</ion-card-title>
        <ion-card-content><a href="" style="text-decoration:none;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    <ion-col>
      <div ><ion-card  color="success">
        <ion-card-title style="text-align:center">2</ion-card-title>
        <ion-text style="text-align:center"><h4>Fichier Archiver</h4></ion-text>
        <ion-card-content><a href="" style="text-decoration:none;">Plus de Detail =></a></ion-card-content>
      </ion-card></div>
    </ion-col>
    
  </ion-row>

</ion-grid>
      </div>
  
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar, actionSheetController,IonButtons,IonMenuButton } from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { menu } from 'ionicons/icons';
import IngenieurMenu from './IngenieurMenu.vue';
addIcons(
    { 
       "menu":menu
    }
    )

export default defineComponent({
  name: 'IngenieurHome',
  methods: {
   async handleButtonClick() {
        const actionSheet = await actionSheetController.create({
          header: 'Information De Connection :',

          buttons: [
            { text: 'Nom : '+localStorage.getItem('name'), icon: 'person'},
            { text: 'Email : '+localStorage.getItem('email'), icon: 'mail'},
            { text: 'Role : Ingenieur', icon: 'shirt'},
            { text: 'Departement : Informatique', icon: 'home'},
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
    IonButtons,
    IonMenuButton,
    IngenieurMenu
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

.hh{height:100px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
</style>
