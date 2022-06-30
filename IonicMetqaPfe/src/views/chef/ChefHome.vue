<template>
  <ion-page>
    <chef-menu></chef-menu>
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
       <ion-buttons slot="start">
              <ion-menu-button></ion-menu-button>
            </ion-buttons>
     <ion-text><h3>chef Accueil</h3></ion-text>
        <ion-button color="dark" slot="end" @click="handleButtonClick()"><ion-icon  name="person" ></ion-icon></ion-button> 
      </ion-toolbar>
      <img class="rr" src="assets/logo.png" />
    </ion-header>
    
    <ion-content :fullscreen="true" id="mainchef">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Blank</ion-title>
        </ion-toolbar>
      </ion-header>
    
      <div id="container">
            
      </div>
  
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar, actionSheetController,IonMenuButton,IonButtons } from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { menu } from 'ionicons/icons';
import ChefMenu from './ChefMenu.vue';

addIcons(
    { 
       "menu":menu
    }
    )

export default defineComponent({
  name: 'ChefHome',
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
    IonMenuButton,
    IonButtons,
    ChefMenu
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
