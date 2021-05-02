using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PBallCharController : MonoBehaviour
{
    Animator animator;

    void Start () 
    {
        animator = GetComponent<Animator>();
    }


    public void JumpAnim()
    {
        if (GameManager.nowChar == "pball")
        {
            animator.SetTrigger("Jump");
        }
        
    }


    public void HitAnim()
    {
        if (GameManager.nowChar == "pball")
        {
            animator.SetTrigger("Hit");
        } 
    }


}
