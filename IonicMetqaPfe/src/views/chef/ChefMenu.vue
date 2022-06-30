<template>

    <ion-menu side="start" content-id="mainchef">
    <ion-header>
      <ion-toolbar color="primary">
        <ion-title>Menu</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content>
       <ion-list>
    <ion-item routerLink="/chefhome">
        <ion-icon slot="start" name="home" color="danger"></ion-icon>
        <ion-label>Accueil</ion-label>
    </ion-item>
    <ion-item routerLink="/reclamationss">
        <ion-icon slot="start" name="receipt" color="danger"></ion-icon>
        <ion-label>Passer Votre Reclamation</ion-label>
    </ion-item>
    <ion-item routerLink="/archive">
        <ion-icon slot="start" name="archive" color="danger"></ion-icon>
        <ion-label>Archive</ion-label>
    </ion-item>
    <ion-item >
        <ion-icon slot="start" name="logOut" color="danger"></ion-icon>
        <ion-label @click="logout()">Deconnecter</ion-label>
    </ion-item>
</ion-list>
    </ion-content>
  </ion-menu>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonTitle, IonToolbar,IonList,IonItem,IonIcon,IonLabel,loadingController, menuController } from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { man,book,heart,home,archive,logOut,receipt} from 'ionicons/icons';
addIcons(
    { 
       "man":man,"book":book,"heart":heart,"home":home,"archive":archive,"logOut":logOut,"receipt":receipt
    }
    )
export default defineComponent({
  name: 'ChefMenu',
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
       }, 1200);
       
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
