<template>
  
    <ion-menu side="start" content-id="mainclient">
    <ion-header>
      <ion-toolbar color="primary">
        <ion-title>Menu</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content>
       <ion-list>
    <ion-item routerLink="/clienthome">
        <ion-icon slot="start" name="home" color="danger"></ion-icon>
        <ion-label>Accueil</ion-label>
    </ion-item>
    <ion-item routerLink="/partenaires">
        <ion-icon slot="start" name="man" color="danger"></ion-icon>
        <ion-label>Partenaire</ion-label>
    </ion-item>
    <ion-item routerLink="/commandess">
        <ion-icon slot="start" name="cart" color="danger"></ion-icon>
        <ion-label>Commande</ion-label>
    </ion-item>
    <ion-item routerLink="/contact">
        <ion-icon slot="start" name="call" color="danger"></ion-icon>
        <ion-label>Contact</ion-label>
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
import { IonContent, IonHeader, IonTitle, IonToolbar,IonList,IonItem,IonIcon,IonLabel,loadingController, menuController} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { man,book,heart,home,logOut,cart,call } from 'ionicons/icons';
addIcons(
    { 
       "man":man,"book":book,"heart":heart,"home":home,"logout":logOut,"cart":cart,"call":call
    }
    )
export default defineComponent({
  name: 'ClientMenu',
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
