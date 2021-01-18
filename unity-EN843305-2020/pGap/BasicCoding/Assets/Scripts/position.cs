using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class position : MonoBehaviour
{
    public int movementSpeed;
    private float currentTime = 0f;
    private float lastTIme = 0f;
    private float deltaTime = 0f;

    void Start()
    {
        // transform.position = new Vector3(5, 2, 0);
    }

    void Update()
    {

        if (Input.GetKeyDown(KeyCode.A) && (Input.GetKey(KeyCode.LeftShift))){
            print("big A key was pressed!!");
        }

        //get the Input from Horizontal axis
        float horizontalInput = Input.GetAxis("Horizontal");
        //get the Input from Vertical axis
        float verticalInput = Input.GetAxis("Vertical");

        //update the position
        transform.position = transform.position + new Vector3(horizontalInput * movementSpeed * Time.deltaTime, verticalInput * movementSpeed * Time.deltaTime, 0);

        //output to log the position change
        Debug.Log(transform.position);

    }
}
