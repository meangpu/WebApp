using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class speedCheck : MonoBehaviour
{
    public float speed = 10.0f;
    public float distance = 100.0f;
    public float time = 50.0f;


    // ip stand from input
    void CalculateSpeed(float ipdistance, float iptime){
        float ipspeed = ipdistance/iptime;
        if (ipspeed > 70 || speed < 40){
            print("You are breaking the law!");
        }
        print("you are traveling at " + ipspeed + " MPH");
    }
    void Start()
    {
 
        
    }

    // Update is called once per frame
    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Space)){
            CalculateSpeed(distance, time);
        }
    }
}
