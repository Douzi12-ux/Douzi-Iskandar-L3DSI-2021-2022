<template >
  <ion-page >
    
  <ion-content :fullscreen="true">
    <ion-header :translucent="true">
      <ion-toolbar class="hh" color="primary">
        <ion-buttons slot="start">
                <ion-back-button defaultHref="/stocks"></ion-back-button>
              </ion-buttons>
              <ion-text><h3>Ajouter article</h3></ion-text>
      </ion-toolbar>
        <img class="rr" src="assets/logo.png" />
    </ion-header>
    
    
     
      <ion-content >
         <div class="content">
      <form>
<ion-item lines="full">
            <ion-label>Fichier</ion-label>
            <ion-icon slot="start" name="document" ></ion-icon>
            <ion-input type="file" name="image" @change="fileselect($event)" required></ion-input>
          </ion-item>
    <ion-item lines="full">
      <ion-icon slot="start" name="link" ></ion-icon>
      <ion-label position="floating">reference</ion-label>
      <ion-input type="text" name="articleRef" v-model="articleRef" required></ion-input>
    </ion-item>

    <ion-item lines="full">
      <ion-icon slot="start" name="telescope" ></ion-icon>
      <ion-label position="floating">nom</ion-label>
      <ion-input type="text" name="articleNom" v-model="articleNom" required></ion-input>
    </ion-item>

    <ion-item lines="full">
      <ion-icon slot="start" name="cash" ></ion-icon>
      <ion-label position="floating">Prix</ion-label>
      <ion-input type="text" name="articlePrixVente" v-model="articlePrixVente" required></ion-input>
    </ion-item>

    <ion-item lines="full">
      <ion-icon slot="start" name="layers" ></ion-icon>
      <ion-label position="floating">Quantite</ion-label>
      <ion-input type="text" name="articleQte" v-model="articleQte" required></ion-input>
    </ion-item>

    <ion-item >
            <ion-label>Fournisseurs</ion-label>
            <ion-icon slot="start" name="home" ></ion-icon>
            <ion-select  name="fournisseur" v-model="fournisseur">
              <ion-select-option v-for="fournisseur in fournisseurs" :key="fournisseur" :value="fournisseur.id">{{fournisseur.nom}}</ion-select-option>
              </ion-select>
    </ion-item>

    <ion-row>
      <ion-col>
      <ion-button class="a" v-on:click="modifierimage(this.$route.params.id);modifierstock(this.$route.params.id)">Confirmer</ion-button>
      </ion-col>
      <ion-col>
      <ion-button  color="danger" router-link="/stocks">Annuler</ion-button>
      </ion-col>
    </ion-row>
  </form>
      </div>
   </ion-content>
  </ion-content>
  </ion-page>
</template>

<script lang="ts">
import { IonContent, IonHeader, IonPage, IonToolbar,IonButton,IonInput,IonLabel,
IonItem,IonBackButton,IonButtons,IonCol,IonRow,toastController,IonSelectOption,IonSelect,IonIcon} from '@ionic/vue';
import { defineComponent } from 'vue';
import { addIcons } from 'ionicons'
import { link,cash,telescope,layers } from 'ionicons/icons';
addIcons(
    { 
       "link":link,"cash":cash,"telescope":telescope,"layers":layers
    }
    )
import axios from 'axios';
export default defineComponent({
   data() {
    return {
      stocks:[],
      fournisseurs:[],
          id:this.$route.params.id,
          image:'',
          articleRef:this.$route.params.articleRef,
          articleNom:this.$route.params.articleNom,
          articlePrixVente:this.$route.params.articlePrixVente,
          articleQte:this.$route.params.articleQte,
      fournisseur:'',
      url:"http://192.168.125.159:8000"
      
     
    }
    
  },methods:{
    fileselect(event: any) {
      this.image = event.target.files[0];
      console.log(event.target.files[0])
    },
     modifierstock(id: any){
        
      axios.put(this.url+'/api/stocks/'+id,
           { 
                    articleRef:this.articleRef,
                    articleNom:this.articleNom,
                    articlePrixVente:this.articlePrixVente,
                    articleQte:this.articlePrixVente,
                    fournisseur:this.fournisseur
                 }).then(async ()=>{
                    const toast = await toastController.create({
                     color: 'success',
                   duration: 2000,
                 message: 'Modifé avec succès',
         
      });
               await toast.present();
               this.$router.push({name:'StocksPage'});
                 });
  },
  modifierimage(id: any){
        var stockss = new FormData();
      stockss.append('image', this.image)
      axios.put(this.url+'/api/image/'+id,stockss)

  }
  },
  created() {

      axios.get(this.url+'/api/stock')
      .then(res => this.stocks = res.data)
      axios.get(this.url+'/api/fournisseur')
      .then(res => this.fournisseurs = res.data)
  },
  name:'EditStocks',
  components: {
    IonContent,
    IonHeader,
    IonPage,
    IonToolbar,
    IonButton,
    IonInput,
    IonLabel,
IonSelectOption,IonSelect,
    IonItem,
   IonBackButton,
   IonButtons
    ,IonCol,IonRow,IonIcon
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
template{color:aqua;}
.a{
  margin-left: 20%;
  background-color: blue;
  }
 .hh{height:70px;border-radius:0px 0px 50px 30px;}
.rr{width: 50%;margin-left: 20%;}
.content{margin-top: 5%;}
</style>