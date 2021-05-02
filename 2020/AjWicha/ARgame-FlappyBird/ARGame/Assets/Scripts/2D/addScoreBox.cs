using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class addScoreBox : MonoBehaviour
{
    private void OnTriggerEnter2D(Collider2D collision)
    {
        Score.score++;
    }
}
