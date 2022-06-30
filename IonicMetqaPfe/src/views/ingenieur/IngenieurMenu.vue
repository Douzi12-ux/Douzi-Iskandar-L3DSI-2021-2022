<template>
   <ion-menu side="start" content-id="mainingenieur">
    <ion-header>
      <ion-toolbar color="primary">
        <ion-title>Menu</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content>
      <ion-list>
    <ion-item routerLink="/ingenieurhome">
        <ion-icon slot="start" name="home" color="danger"></ion-icon>
        <ion-label>Accueil</ion-label>
    </ion-item>
  
  <ion-item routerLink="/reclamationn">
        <ion-icon slot="start" name="receipt" color="danger"></ion-icon>
        <ion-label>Consulter Les Reclamation</ion-label>
    </ion-item>
<ion-item routerLink="/archivess">
        <ion-icon slot="start" name="archive" color="danger"></ion-icon>
        <ion-label>Archive</ion-label>
    </ion-item>
   <ion-item >
        <ion-icon slot="start" name="logout" color="danger"></ion-icon>
        <ion-label @click="logout()">Deconnecter</ion-label>
    </ion-item>
</ion-list>
    </ion-content>
  </ion-menu>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonTitle, IonToolbar,IonList,IonItem,IonIcon,IonLabel, loadingController, menuController } from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { archive,home,logOut,receipt } from 'ionicons/icons';
addIcons(
    { 
      "archive":archive,"home":home,"logOut":logOut,"receipt":receipt
    }
    )
export default defineComponent({
  name: 'IngenieurMenu',
  methods:{
    async logout(){
      
      localStorage.clear();
       const loading = await loadingController
        .create({
          cssClass: 'my-custom-class',
          message: 'Please wait...',
          duration: 1300});
           await loading.present();
       setTimeout(() => {
         location.replace('/home')
       }, 1300);
       
    }
     },
   watch: {
    async $route() {

      await menuController.close();

    }
        
  },
  components: {
    IonContent,
    IonHeader,
    IonTitle,
    IonToolbar,
    IonList,IonItem,IonIcon,IonLabel
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
</style>

   