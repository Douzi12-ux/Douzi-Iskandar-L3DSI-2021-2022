<template>

    <ion-menu side="start" content-id="main">
    <ion-header>
      <ion-toolbar color="primary">
        <ion-title>Menu</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content>
     <ion-list>
    <ion-item routerLink="/adminhome">
        <ion-icon slot="start" name="home" color="danger"></ion-icon>
        <ion-label>Accueil</ion-label>
    </ion-item>
    <ion-item routerLink="/users">
        <ion-icon slot="start" name="people" color="danger"></ion-icon>
        <ion-label>Utilisateurs</ion-label>
    </ion-item>
    <ion-item routerLink="/fournisseurs">
        <ion-icon slot="start" name="man" color="danger"></ion-icon>
        <ion-label>Fournisseurs</ion-label>
    </ion-item>
    <ion-item routerLink="/stocks">
        <ion-icon slot="start" name="storefront" color="danger"></ion-icon>
        <ion-label>Articles</ion-label>
    </ion-item>
    <ion-item routerLink="/commandes">
        <ion-icon slot="start" name="cart" color="danger"></ion-icon>
        <ion-label>Commandes</ion-label>
    </ion-item>
    <ion-item routerLink="/archives">
        <ion-icon slot="start" name="archive" color="danger"></ion-icon>
        <ion-label>Archives</ion-label>
    </ion-item>
    <ion-item routerLink="/reclamations">
        <ion-icon slot="start" name="receipt" color="danger"></ion-icon>
        <ion-label>Reclamation</ion-label>
    </ion-item>
    <ion-item >
       <ion-icon slot="start" name="logOutt" color="danger"></ion-icon>
        <ion-label @click="logout()">Deconnecter</ion-label>
    </ion-item>
</ion-list>
    </ion-content>
  </ion-menu>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonTitle, IonToolbar,IonList,IonItem,IonIcon,IonLabel, menuController, loadingController } from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { man,book,heart,home,archive,cart,storefront,people,logOut,receipt } from 'ionicons/icons';
addIcons(
    { 
       "man":man,"book":book,"heart":heart,"home":home,"archive":archive,"cart":cart,"storefront":storefront,"logOutt":logOut,
       "people":people,"receipt":receipt
    }
    )
export default defineComponent({
  name: 'AdminMenu',
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
