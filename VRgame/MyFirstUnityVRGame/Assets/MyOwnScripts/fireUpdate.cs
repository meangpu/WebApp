using System.Collections;
using System.Collections.Generic;
using UnityEngine.UI;
using UnityEngine;
using TMPro;

public class fireUpdate : MonoBehaviour
{
    public Slider slider;
    public Vector3 newSize;


    // Update is called once per frame
    void Update()
    {
        float Value = slider.value; 
        newSize = new Vector3 (Value, Value, Value);
        gameObject.transform.localScale = newSize;
    }
}
