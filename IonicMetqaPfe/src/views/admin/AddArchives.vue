<template >
  <ion-page >

    <ion-content :fullscreen="true">
      <ion-header :translucent="true">
        <ion-toolbar class="hh" color="primary">
          <ion-buttons slot="start">
            <ion-back-button defaultHref="/stocks"></ion-back-button>
          </ion-buttons>
           <ion-text><h3>Archiver Fichier</h3></ion-text>
        </ion-toolbar>
         <img class="rr" src="assets/logo.png" />
      </ion-header>



      <ion-content>
        <div class="content">
        <form>

          <ion-item lines="full">
            <ion-label position="floating">Description</ion-label>
            <ion-icon slot="start" name="pencil" ></ion-icon>
            <ion-input type="text" name="description" v-model="description" required></ion-input>
          </ion-item>

          <ion-item lines="full">
            <ion-label>Fichier</ion-label>
            <ion-icon slot="start" name="document" ></ion-icon>
            <ion-input type="file" name="fichier" @change="fileselect($event)" required></ion-input>
          </ion-item>




          <ion-row>
            <ion-col>
              <ion-button class="a" v-on:click="add()">Confirmer</ion-button>
            </ion-col>
            <ion-col>
              <ion-button color="danger" router-link="/archives">Annuler</ion-button>
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
  IonItem, IonBackButton, IonButtons, IonCol, IonRow, toastController
} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { document,pencil } from 'ionicons/icons';
addIcons(
    { 
       "document":document,"pencil":pencil
    }
    )
import axios from 'axios';
export default defineComponent({
  data() {
    return {
      archives: [],
      description: '',
      fichier: '',                        
url:"http://192.168.125.159:8000"


    }

  }, methods: {
    fileselect(event: any) {
      this.fichier = event.target.files[0];
      console.log(event.target.files[0])
    },
    add() {
      var archive = new FormData();
      archive.append('description', this.description)
      archive.append('fichier', this.fichier)
      axios.post(this.url+'/api/addarchive', archive)
        .then(async () => {
          const toast = await toastController.create({
            color: 'secondary',
            duration: 2000,
            message: 'Ajouté avec succès',

          });
          axios.get(this.url+'api/archive')
            .then(res => this.archives = res.data)
          await toast.present();
          this.$router.push({ name: 'ArchivesPage' });

        })
    }
  },
  created() {

    axios.get(this.url+'/api/archive')
      .then(res => this.archives = res.data)

  },
  name: 'AddArchives',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonToolbar,
    IonButton,
    IonInput,
    IonLabel,

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