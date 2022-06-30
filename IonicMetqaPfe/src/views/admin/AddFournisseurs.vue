<template >
  <ion-page >

    <ion-content :fullscreen="true">
      <ion-header :translucent="true" >
        <ion-toolbar class="hh" color="primary">
          <ion-buttons slot="start">
            <ion-back-button defaultHref="/stocks"></ion-back-button>
            <ion-text><h3>Ajouter Partenaire</h3></ion-text>
          </ion-buttons>
        </ion-toolbar>
        <img class="rr" src="assets/logo.png" />
      </ion-header>



      <ion-content>
        <div class="content">
        <form>

          <ion-item lines="full">
            <ion-label position="floating">Nom</ion-label>
             <ion-icon slot="start" name="person" ></ion-icon>
            <ion-input type="text" name="nom" v-model="nom" required></ion-input>
          </ion-item>

             <ion-item lines="full">
            <ion-label position="floating">Email</ion-label>
             <ion-icon slot="start" name="mail" ></ion-icon>
            <ion-input type="text" name="email" v-model="email" required></ion-input>
          </ion-item>

          <ion-item lines="full">
            <ion-label position="floating">Telephone</ion-label>
             <ion-icon slot="start" name="call" ></ion-icon>
            <ion-input type="tel" name="phone" v-model="phone" required></ion-input>
          </ion-item>
          
          <ion-item lines="full">
            <ion-label position="floating">Logo</ion-label>
             <ion-icon slot="start" name="sparkles" ></ion-icon>
            <ion-input type="file" name="logo_image" @change="fileselect($event)" placeholder="logo" required></ion-input>
          </ion-item>

          <ion-row>
            <ion-col>
              <ion-button class="a" v-on:click="add()">Confirmer</ion-button>
            </ion-col>
            <ion-col>
              <ion-button color="danger" router-link="/fournisseurs">Annuler</ion-button>
            </ion-col>
          </ion-row>
        </form>
</div>
      </ion-content>
    </ion-content>
  </ion-page>
</template>

<script lang="ts">
import {
  IonContent, IonHeader, IonPage, IonToolbar, IonButton, IonInput, IonLabel,
  IonItem, IonBackButton, IonButtons, IonCol, IonRow, toastController,IonIcon
} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { sparkles,home,call,mail } from 'ionicons/icons';
addIcons(
    { 
       "sparkles":sparkles,"home":home,"call":call,"mail":mail
    }
    )
import axios from 'axios';
export default defineComponent({
  data() {
    return {
      fournisseurs: [],
      nom: '',
      email: '',
      phone: '',
      logo_image: '',
url:"http://192.168.125.159:8000"


    }

  }, methods: {
    fileselect(event: any) {
      this.logo_image = event.target.files[0];
      console.log(event.target.files[0])
    },
    add() {
      var fournisseur = new FormData();
      fournisseur.append('nom', this.nom)
      fournisseur.append('email', this.email)
      fournisseur.append('phone', this.phone)
      fournisseur.append('logo_image', this.logo_image)
      axios.post(this.url+'/api/addfournisseurs', fournisseur)
        .then(async () => {
          const toast = await toastController.create({
            color: 'secondary',
            duration: 2000,
            message: 'Ajouté avec succès',

          });
          axios.get(this.url+'api/fournisseur')
            .then(res => this.fournisseurs = res.data)
            axios.get(this.url+'api/fournisseur')
            .then(res => this.fournisseurs = res.data)
          await toast.present();
          this.$router.push({ name: 'FournisseursPage' });

        })
    }
  },
  created() {

    axios.get(this.url+'/api/fournisseur')
      .then(res => this.fournisseurs = res.data)

  },
  name: 'AddFournisseurs',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonToolbar,
    IonButton,
    IonInput,
    IonLabel,
    IonIcon,
    IonItem,
    IonBackButton,
    IonButtons
    , IonCol, IonRow
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

template {
  color: aqua;
}

.a {
  margin-left: 20%;
  background-color: blue;
}

.hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
</style>