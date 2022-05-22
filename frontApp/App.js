import * as React from 'react';
import {
  Text, 
  View,
  StyleSheet,
  Image,
  SafeAreaView } from 'react-native';

import Carousel from 'react-native-snap-carousel';

import DropShadow from 'react-native-drop-shadow';
import Pressable from 'react-native/Libraries/Components/Pressable/Pressable';

var returnButton = "<" ; 


export default class App extends React.Component {


  
 
    constructor(props){
        super(props);
        this.state = {
          activeIndex:0,
          carouselItems: [
          {
              image:"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhKmZuDjd-ZGY4krk7Y4gSDZHTY31CCFpk_w&usqp=CAU",
              text: "Text 1",
              name:"Carla TIBICHE",
              formation:"sécurité informatique",
              desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut "

          },
          {
            image:"https://i.pinimg.com/550x/7d/1a/3f/7d1a3f77eee9f34782c6f88e97a6c888.jpg",
            text: "Text 2",
            name:"Marcel ",
            formation:"Kotlin",
            desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut "

          },
          {
              image:"https://www.whatsappimages.in/wp-content/uploads/2021/12/girl-New-Superb-Whatsapp-Dp-Profile-Images-photo.jpg",
              text: "Text 3",
              name:"ahmed HAMED",
              formation:"C++",
              desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut "

          },
          {
              image:"https://i.pinimg.com/550x/7d/1a/3f/7d1a3f77eee9f34782c6f88e97a6c888.jpg",
              text: "Text 4",
              name:"jonnathan MBOSSA",
              formation:"JAVA",
              desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut "

          },
       
        ]
      }
    }

    _renderItem({item,index}){
        return (
          <View style={{
              backgroundColor:'white',
              zIndex:2,
              borderColor:"lightgrey",
              borderWidth:1,
              shadowOffset:{width:15 , height:15},
              shadowOpacity:0.7,
              elevation:20,
              borderRadius: 10,
              height: 430,
              padding: 20,
              marginLeft: 10,
              marginRight: 10, }}>
            <Image
              source={{uri:item.image}}
              style={{width:80,height:80 , borderRadius:200/2}}
            /> 
            <Text style={styles.name}>{item.name}</Text>
            <Text style={{color:'grey', marginTop:30}}>Formation</Text>
            <Text style={styles.formation}>{item.formation}</Text>
            <Text style={{color:'grey', marginTop:20}}>Description</Text>
            <Text>{item.desc}</Text>
            <Pressable style={styles.buttonA}>
              <Text style={{color:'white' , fontSize:13}}>Prendre un cours avec ce teacher</Text>
            </Pressable>
            
            <Pressable style={styles.buttonB}>
              <Text style={{color:'#faa405' , fontSize:13}} >retirer ce teacher de mes favoris</Text>
            </Pressable>
            
          </View>

        )
    }

    render() {
        return (
          <SafeAreaView style={{flex:1}}>

            <View style={styles.header}>
            <Pressable>
            <Text style={styles.ret}>
              {
                returnButton 
              }
            </Text>
            </Pressable>
            <Text style={styles.title}>
                Teach'rs Favoris
            </Text>

            </View>


            <View style={{ flex: 1, flexDirection:'row', justifyContent: 'center', marginTop:60 }}>
                <Carousel
                  layout={"default"}
                  ref={ref => this.carousel = ref}
                  data={this.state.carouselItems}
                  sliderWidth={300}
                  itemWidth={300}
                  renderItem={this._renderItem}
                  onSnapToItem = { index => this.setState({activeIndex:index}) } />
            </View>
          </SafeAreaView>
        );
    }

    
}


const styles = StyleSheet.create({
  header:{
    backgroundColor: "#1E6CF0",
    height:220,
 
    
  } , 
 
  title:{
     color:"white",
     fontSize:30,
     fontWeight:"bold",
     marginLeft:30,
     marginTop:20
     
    },
    ret:{
      fontSize:35,
      fontWeight:"bold",
      marginTop:60,
      marginLeft:30,
      color:"white"
    },
    name:{
      position:'absolute',
      marginLeft:120,
      marginTop:45,
      fontSize:18
    },
    buttonA:{

      marginTop:30,
      marginBottom:10,
      alignItems: 'center',
      justifyContent: 'center',
      paddingVertical: 10,
      paddingHorizontal: 10,
      borderRadius: 4,
      backgroundColor: '#1E6CF0',
      
    },
    buttonB:{

      marginBottom:10,
      alignItems: 'center',
      justifyContent: 'center',
      borderColor:"#faa405",
      borderWidth:1,
      paddingVertical: 10,
      paddingHorizontal: 10,
      borderRadius: 4,
    }
 });
 