import './App.css';
import Navbar from './components/navbar/Navbar';
import Card from "./components/card/Card"
import data from './data';


function App() {

  // let counting = [
  //   { name: "adil" },
  //   { name: "aqib" },
  //   { name: "ali" },
  //   { name: "hamza" },
  //   { name: "hello" },
  //   { name: "ali" },
  //   { name: "hamza" },
  // ]

  // counting.map((student,i) => {

  //   console.log( i , student.name)
  // })




  return (
    <div className="App">
      <Navbar />

      <div className="card-div">

        {data.map((blog, i) => {
          return <Card key={i} title={blog.title} content={blog.content} image={blog.image} date={blog.date} tag={blog.tag} />
        })}




      </div>
    </div>
  );
}

export default App;
