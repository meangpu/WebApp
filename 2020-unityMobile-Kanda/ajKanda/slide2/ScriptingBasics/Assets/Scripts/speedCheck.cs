using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class speedCheck : MonoBehaviour
{
    public float speed = 10.0f;
    public float distance = 100.0f;
    public float time = 50.0f;
    public float maxSpeedLimit = 70f;
    public float minSpeedLimit = 40f;

    // ip stand from input
    void SpeedCalculate(){
        speed = distance / time;
        if (speed > maxSpeedLimit){
            print("You are exceeding the speed limit!");
        }
        else if (speed < minSpeedLimit){
            print("You are not going fast enough");
        }
        else if (speed == maxSpeedLimit || speed == minSpeedLimit){
            print("You are about to breaking the law!");
        }       
        else {
            print("You are within the speed limit!");
        }  
    }
    void Start()
    {
        SpeedCalculate();
    }

    // Update is called once per frame
    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Space)){
            SpeedCalculate();
        }
    }
}
