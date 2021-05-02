using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FruitManager : MonoBehaviour
{
    // Start is called before the first frame update

    public FruitSpawn[] Fruitpoint;
    void Start()
    {
       Fruitpoint  =  transform.GetComponentsInChildren<FruitSpawn>();
       InvokeRepeating("CreateFruit",1f,5f);

    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void CreateFruit(){

        // Random create fruit at Fruitpoint
        int r = Random.Range(0, Fruitpoint.Length);
        Fruitpoint[r].CreateFruit();


    }
}
