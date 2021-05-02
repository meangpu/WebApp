using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FruitSpawn : MonoBehaviour
{
    // Start is called before the first frame update
    public GameObject fruit;
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void CreateFruit(){
        //Create Fruit
        Instantiate(fruit,transform.position,Quaternion.identity);

    }
}
