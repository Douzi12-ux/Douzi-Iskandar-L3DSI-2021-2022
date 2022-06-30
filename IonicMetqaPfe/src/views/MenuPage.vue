<template>
  <ion-menu side="start" content-id="main">
    <ion-header>
      <ion-toolbar color="primary">
        <ion-title>Menu</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content>
      <ion-list>
        <ion-item routerLink="/home">

          <ion-icon slot="start" name="home" color="danger"></ion-icon> Accueil
        </ion-item>
        <ion-item routerLink="/connection">
          <ion-icon slot="start" name="login" color="danger"></ion-icon>Connecter
        </ion-item>
        <ion-item routerLink="/inscription">
          <ion-icon slot="start" name="heart" color="danger"></ion-icon>Inscription
        </ion-item>
      </ion-list>
    </ion-content>
  </ion-menu>

</template>

<script lang="ts">
import { IonContent, IonHeader, menuController, IonTitle, IonToolbar, IonList, IonItem, IonIcon, IonMenu} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { man, book, heart, logIn, home } from 'ionicons/icons';
addIcons(
  {
    "man": man, "book": book, "heart": heart, "login": logIn, "home": home

  }
)
export default defineComponent({
  name: 'MenuPage',
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
    IonList, IonItem, IonIcon, IonMenu
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
