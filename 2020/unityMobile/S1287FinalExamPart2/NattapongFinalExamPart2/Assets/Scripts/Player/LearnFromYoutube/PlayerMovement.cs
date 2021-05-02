using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerMovement : MonoBehaviour
{
    public CharacterController2D controller;
    public PBallCharController animControl;

    public float runSpeed = 40f;
    bool jump = false;

    float horizontalMove = 0f;

    public float moveToRight;

    private void Start() 
    {
        animControl = gameObject.GetComponent<PBallCharController>();
    }



    void Update()
    {
        horizontalMove = Input.GetAxisRaw("Horizontal") * runSpeed;

        if (Input.GetButtonDown("Jump"))
        {
            jump = true;
            animControl.JumpAnim();
            
        }
    }

    private void FixedUpdate() {
        // controller.Move(horizontalMove * Time.fixedDeltaTime, false, jump);
        controller.Move((moveToRight*runSpeed) * Time.fixedDeltaTime, false, jump);
        jump = false;
    }
}
