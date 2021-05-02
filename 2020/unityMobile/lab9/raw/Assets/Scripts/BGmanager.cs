using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BGmanager : MonoBehaviour
{
    public int randomBg;
    public int maxBgNum;
    void Start()
    {
        randomBg = Random.Range(0, maxBgNum);
        foreach (Transform child in transform)
        {
            child.gameObject.SetActive(false);
        }
        transform.GetChild(randomBg).gameObject.SetActive(true);

    }

}
